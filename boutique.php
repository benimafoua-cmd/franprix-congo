<?php 
// LIENS D'INCLUSION DES MODULES
include('config/db.php'); 
include('includes/header.php'); 

$query = $pdo->query("SELECT * FROM produits");
$produits = $query->fetchAll();
?>

<div class="container my-5">
    <h2 class="text-center mb-5 text-franprix">Nos Produits Disponibles</h2>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <?php foreach ($produits as $produit): ?>
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?php echo htmlspecialchars($produit['nom_produit']); ?></h5>
                        <p class="text-danger fw-bold fs-5 mt-auto"><?php echo $produit['prix_fcfa']; ?> FCFA</p>
                        <!-- Lien d'action JavaScript propre -->
                        <button class="btn btn-warning text-white fw-bold bg-franprix border-0" 
                                onclick="ajouterAuPanier(<?php echo $produit['id_product']; ?>, '<?php echo addslashes($produit['nom_produit']); ?>', <?php echo $produit['prix_fcfa']; ?>, '')">
                            Ajouter
                        </button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include('includes/footer.php'); ?>
