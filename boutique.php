<?php 
// boutique.php
include('config/db.php'); 
include('includes/header.php'); 

$ville_actuelle = $_SESSION['ville_active'];

try {
    $query = $pdo->query("SELECT * FROM produits");
    $produits = $query->fetchAll();
} catch (PDOException $e) {
    echo "<div class='alert alert-danger'>Erreur de chargement des produits.</div>";
    $produits = [];
}
?>

<div class="container my-5" style="min-height: 70vh;">
    <h2 class="text-center mb-4 text-franprix fw-bold" style="color: #FF6600; text-align: center; font-size: 2rem; text-transform: uppercase;">
        Franprix <?php echo $ville_actuelle; ?>
    </h2>

    <!-- BARRE DE RECHERCHE ET ONGLETS DE RAYONS -->
    <div style="background: white; padding: 20px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); margin-bottom: 30px;">
        <div style="display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center;">
            
            <!-- Recherche textuelle -->
            <div style="flex: 1; min-width: 250px; margin-bottom: 10px;">
                <input type="text" id="barre-recherche" class="form-control" placeholder="🔍 Rechercher un article ou un repas..." onkeyup="filtrerTout()" style="margin-bottom: 0;">
            </div>
            
            <!-- Les Onglets de l'enseigne -->
            <div style="margin-bottom: 10px;">
                <button class="btn-onglet active" id="onglet-supermarche" onclick="changerOnglet('Supermarché')" style="padding: 12px 20px; font-weight: bold; background-color: #FF6600; color: white; border: none; border-radius: 6px; cursor: pointer; margin-right: 10px;">
                    🛒 Rayon Supermarché
                </button>
                <button class="btn-onglet" id="onglet-fastfood" onclick="changerOnglet('Fast-Food')" style="padding: 12px 20px; font-weight: bold; background-color: #eef2f5; color: #333; border: none; border-radius: 6px; cursor: pointer;">
                    🍗 Coin Fast-Food & Resto
                </button>
            </div>

        </div>
    </div>
    
    <!-- LA GRILLE DYNAMIQUE -->
    <div class="row" id="grille-produits">
        <?php foreach ($produits as $produit): 
            $stock = ($ville_actuelle === 'Pointe-Noire') ? $produit['stock_pointenoire'] : $produit['stock_brazzaville'];
        ?>
            <!-- On stocke le type (Supermarché ou Fast-Food) dans un attribut data-type -->
            <div class="col carte-produit-parent" 
                 data-nom="<?php echo strtolower(htmlspecialchars($produit['nom_produit'])); ?>" 
                 data-type="<?php echo $produit['type_produit']; ?>">
                
                <div class="card" style="<?php echo ($stock <= 0) ? 'opacity: 0.6;' : ''; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($produit['nom_produit']); ?></h5>
                        <p style="color: #6c757d; font-size: 14px; margin-bottom: 10px;"><?php echo htmlspecialchars($produit['description']); ?></p>
                        
                        <div class="mt-auto">
                            <?php if ($stock > 0): ?>
                                <p style="color: green; font-size: 13px; font-weight: bold; margin: 5px 0;">✅ Disponible (Stock: <?php echo $stock; ?>)</p>
                                <p class="text-danger"><?php echo number_format($produit['prix_fcfa'], 0, ',', ' '); ?> FCFA</p>
                                <button class="btn-franprix" onclick="ajouterAuPanier(<?php echo $produit['id_product']; ?>, '<?php echo addslashes(htmlspecialchars($produit['nom_produit'])); ?>', <?php echo $produit['prix_fcfa']; ?>, '')">
                                    🛒 Ajouter au caddie
                                </button>
                            <?php else: ?>
                                <p style="color: red; font-size: 13px; font-weight: bold; margin: 5px 0;">❌ Épuisé / Non disponible aujourd'hui</p>
                                <p class="text-danger"><?php echo number_format($produit['prix_fcfa'], 0, ',', ' '); ?> FCFA</p>
                                <button class="btn-franprix" style="background-color: #6c757d; cursor: not-allowed;" disabled>Indisponible</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- SCRIPT DE FILTRAGE DES RAYONS ET DE LA RECHERCHE TEXTUELLE -->
<script>
let rayonActif = "Supermarché"; // Par défaut, on affiche le supermarché

function changerOnglet(type) {
    rayonActif = type;
    
    // Gérer l'état visuel des deux gros boutons
    let btnSuper = document.getElementById('onglet-supermarche');
    let btnResto = document.getElementById('onglet-fastfood');
    
    if (type === 'Supermarché') {
        btnSuper.style.backgroundColor = '#FF6600'; btnSuper.style.color = 'white';
        btnResto.style.backgroundColor = '#eef2f5'; btnResto.style.color = '#333';
    } else {
        btnResto.style.backgroundColor = '#FF6600'; btnResto.style.color = 'white';
        btnSuper.style.backgroundColor = '#eef2f5'; btnSuper.style.color = '#333';
    }
    
    // Lancer le filtrage global
    filtrerTout();
}

function filtrerTout() {
    let recherche = document.getElementById('barre-recherche').value.toLowerCase().trim();
    let cartes = document.querySelectorAll('.carte-produit-parent');

    cartes.forEach(carte => {
        let nom = carte.getAttribute('data-nom');
        let type = carte.getAttribute('data-type');

        // Le produit doit correspondre à la recherche ET à l'onglet sélectionné
        if (type === rayonActif && nom.includes(recherche)) {
            carte.style.display = "block";
        } else {
            carte.style.display = "none";
        }
    });
}

// Lancer le filtrage dès l'ouverture de la page pour cacher le fast-food au départ
document.addEventListener("DOMContentLoaded", () => {
    filtrerTout();
});
</script>

<?php include('includes/footer.php'); ?>
