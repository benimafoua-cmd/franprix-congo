<?php include('includes/header.php'); $id = isset($_GET['commande_id']) ? intval($_GET['commande_id']) : 0; ?>
<div class="container my-5 text-center py-5">
    <h1 class="text-success fw-bold">✅ Commande validée !</h1>
    <h3>Numéro de ticket : #FP-<?php echo $id; ?></h3>
    <p>Un agent Franprix Congo va vous appeler sous peu. Merci !</p>
    <a href="boutique.php" class="btn btn-franprix mt-3 border-0">Retour à la boutique</a>
</div>
<?php include('includes/footer.php'); ?>
