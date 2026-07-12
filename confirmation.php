<?php 
// confirmation.php
include('header.php'); 

// On récupère le numéro de commande généré par traitement_commande.php dans l'URL
$commande_id = isset($_GET['commande_id']) ? intval($_GET['commande_id']) : 0;
?>

<div class="container my-5 text-center" style="min-height: 60vh; padding-top: 5rem;">
    <div class="card shadow p-5 mx-auto" style="max-width: 600px; border-radius: 15px;">
        <div class="mb-4">
            <!-- Une grosse coche verte pour indiquer le succès -->
            <span style="font-size: 5rem; color: #28a745;">✅</span>
        </div>
        
        <h1 class="fw-bold text-success mb-3">Commande validée !</h1>
        <p class="fs-5 text-muted">Merci pour votre confiance chez Franprix Congo.</p>
        
        <div class="bg-light p-3 rounded my-4">
            <p class="mb-1 text-uppercase fw-semibold tracking-wider text-secondary small">Numéro de votre commande</p>
            <h3 class="fw-bold text-dark">#FP-<?php echo $commande_id; ?></h3>
        </div>

        <p class="text-start text-muted mx-auto" style="max-width: 450px;">
            ℹ️ **Et maintenant ?** Nos équipes de préparation vérifient immédiatement la disponibilité de vos articles. Un agent Franprix va vous appeler par téléphone d'ici quelques minutes pour confirmer l'heure de livraison ou votre heure de retrait.
        </p>

        <hr class="my-4">

        <a href="boutique.php" class="btn btn-warning text-white fw-bold bg-franprix border-0 px-4 py-2">
            Retourner à l'accueil du magasin
        </a>
    </div>
</div>

<?php include('footer.php'); ?>
