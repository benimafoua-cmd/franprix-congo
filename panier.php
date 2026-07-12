<?php include('includes/header.php'); ?>
<div class="container my-5" style="min-height: 70vh;">
    <h2 class="mb-4 fw-bold">Votre Caddie Franprix</h2>
    <div class="table-responsive shadow-sm rounded">
        <table class="table align-middle bg-white mb-0">
            <thead class="table-light"><tr><th>Produit</th><th>Prix</th><th>Quantité</th><th>Sous-total</th><th>Action</th></tr></thead>
            <tbody id="contenu-panier"></tbody>
        </table>
    </div>
    <div class="row mt-4 align-items-center">
        <div class="col-md-6"><a href="boutique.php" class="btn btn-outline-dark">← Retour aux rayons</a></div>
        <div class="col-md-6 text-md-end mt-3 mt-md-0">
            <h4 class="mb-3">Total : <span id="total-panier" class="text-success fw-bold">0 FCFA</span></h4>
            <a href="commande.php" class="btn btn-success btn-lg px-5 fw-bold">Passer la commande</a>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>

