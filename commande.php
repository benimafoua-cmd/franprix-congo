<?php include('includes/header.php'); ?>
<div class="container my-5">
    <div class="row g-5">
        <div class="col-lg-7">
            <h3 class="mb-4 fw-bold text-franprix">Validation de la commande</h3>
            <form id="formulaire-commande" action="traitement_commande.php" method="POST" class="bg-white p-4 rounded shadow-sm">
                <!-- Champ masqué indispensable pour transférer les données du panier -->
                <input type="hidden" name="panier_data" id="panier_data">
    
                <!-- Laissez tous vos autres champs en dessous (Nom, Téléphone, Ville, etc.) -->
                <div class="row g-3">
                    <div class="col-12"><label class="form-label">Nom complet *</label><input type="text" name="nom" class="form-control" required></div>
                    <div class="col-12"><label class="form-label">Téléphone (MTN / Airtel) *</label><input type="tel" name="telephone" class="form-control" required></div>
                    <div class="col-md-6"><label class="form-label">Ville *</label><select name="ville" class="form-select" required><option value="Brazzaville">Brazzaville</option><option value="Pointe-Noire">Pointe-Noire</option></select></div>
                    <div class="col-md-6"><label class="form-label">Retrait *</label><select name="mode_retrait" class="form-select" required><option value="Livraison">Livraison à domicile</option><option value="Click & Collect">Click & Collect</option></select></div>
                    <div class="col-12"><label class="form-label">Quartier & Précisions *</label><textarea name="adresse" class="form-control" rows="3" required></textarea></div>
                    <div class="col-12"><label class="form-label">Paiement *</label>
                        <select name="paiement" class="form-select"><option value="MTN Mobile Money">MTN Mobile Money</option><option value="Airtel Money">Airtel Money</option><option value="Cash">Espèces à la livraison</option></select>
                    </div>
                </div>
                <button class="btn btn-franprix w-100 mt-4 py-2" type="submit">Confirmer l'achat</button>
            </form>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>
