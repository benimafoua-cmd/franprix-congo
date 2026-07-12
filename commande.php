<?php 
// commande.php
include('header.php'); 
?>

<div class="container my-5">
    <div class="row g-5">
        <!-- Formulaire à gauche -->
        <div class="col-lg-7">
            <h3 class="mb-4 fw-bold text-franprix">Validation de votre commande</h3>
            
            <!-- Notez bien l'ID et l'input hidden indispensables pour la liaison JavaScript -->
            <form id="formulaire-commande" action="traitement_commande.php" method="POST" class="bg-white p-4 rounded shadow-sm">
                <input type="hidden" name="panier_data" id="panier_data">
                
                <div class="row g-3">
                    <div class="col-sm-12">
                        <label class="form-label fw-semibold">Nom complet du destinataire *</label>
                        <input type="text" name="nom" class="form-control" required placeholder="Ex: Jean Loubaki">
                    </div>

                    <div class="col-sm-12">
                        <label class="form-label fw-semibold">Numéro de téléphone (Airtel / MTN) *</label>
                        <input type="tel" name="telephone" class="form-control" required placeholder="Ex: 06 600 00 00">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Ville de livraison *</label>
                        <select name="ville" class="form-select" required>
                            <option value="Brazzaville">Brazzaville</option>
                            <option value="Pointe-Noire">Pointe-Noire</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Mode de retrait *</label>
                        <select name="mode_retrait" class="form-select" required>
                            <option value="Livraison">Livraison à domicile</option>
                            <option value="Click & Collect">Retrait en Magasin (Click & Collect)</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold">Quartier ou Arrondissement *</label>
                        <input type="text" name="quartier" class="form-control" required placeholder="Ex: Poto-Poto, Bacongo, Grand Marché, Tié-Tié...">
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold">Précisions pour le livreur (Avenue, repère connu) *</label>
                        <textarea name="adresse" class="form-control" rows="3" required placeholder="Ex: Avenue de la Paix, à côté de la pharmacie..."></textarea>
                    </div>
                </div>

                <h4 class="mt-4 mb-3 fw-bold text-muted">Moyen de paiement au Congo</h4>
                <div class="my-3 card p-3 bg-light border-0">
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="paiement" value="MTN Mobile Money" checked>
                        <label class="form-check-label fw-semibold">📱 MTN Mobile Money</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="paiement" value="Airtel Money">
                        <label class="form-check-label fw-semibold">📱 Airtel Money</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="paiement" value="Cash à la livraison">
                        <label class="form-check-label fw-semibold">💵 Espèces à la livraison / au retrait</label>
                    </div>
                </div>

                <button class="btn btn-warning btn-lg w-100 text-white fw-bold bg-franprix border-0 mt-3" type="submit">
                    Confirmer mon achat chez Franprix
                </button>
            </form>
        </div>

        <!-- Récapitulatif visuel à droite -->
        <div class="col-lg-5">
            <div class="p-4 bg-light rounded shadow-sm sticky-top" style="top: 20px;">
                <h4 class="fw-bold mb-3">Vos articles</h4>
                <table class="table table-sm align-middle">
                    <tbody id="contenu-panier">
                        <!-- Rempli automatiquement par panier.js -->
                    </tbody>
                </table>
                <hr>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-5 fw-semibold">Net à payer :</span>
                    <span id="total-panier" class="fs-4 text-danger fw-bold">0 FCFA</span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
