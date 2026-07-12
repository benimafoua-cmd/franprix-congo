<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include('config/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sécurisation des données reçues du formulaire
    $nom_complet = htmlspecialchars(strip_tags(trim($_POST['nom'])));
    $telephone = htmlspecialchars(strip_tags(trim($_POST['telephone'])));
    $ville = htmlspecialchars(strip_tags($_POST['ville']));
    $mode_retrait = htmlspecialchars(strip_tags($_POST['mode_retrait']));
    $adresse = htmlspecialchars(strip_tags(trim($_POST['adresse'])));
    $mode_paiement = htmlspecialchars(strip_tags($_POST['paiement']));
    
    // Récupération des données du panier JavaScript
    $panier_json = isset($_POST['panier_data']) ? $_POST['panier_data'] : '[]';
    $panier = json_decode($panier_json, true);
    
    if (empty($nom_complet) || empty($telephone) || empty($panier)) {
        die("Erreur : Les informations de commande sont incomplètes ou le panier est vide.");
    }

    try {
        // Sécurité : On lance une transaction SQL. Si une étape plante, rien n'est écrit en BDD
        $pdo->beginTransaction();

        // 1. Vérifier si le client existe déjà avec son numéro de téléphone
        $stmtUser = $pdo->prepare("SELECT id_utilisateur FROM utilisateurs WHERE telephone = ?");
        $stmtUser->execute([$telephone]);
        $user = $stmtUser->fetch();

        if ($user) {
            $id_utilisateur = $user['id_utilisateur'];
        } else {
            // Création automatique du client s'il est nouveau
            $stmtInsertUser = $pdo->prepare("INSERT INTO utilisateurs (nom_complet, telephone, quartier_livraison) VALUES (?, ?, ?)");
            $stmtInsertUser->execute([$nom_complet, $telephone, $adresse]);
            $id_utilisateur = $pdo->lastInsertId();
        }

        // 2. Calcul du montant total réel depuis le serveur (sécurité anti-fraude)
        $montant_total = 0;
        foreach ($panier as $item) {
            $stmtPrix = $pdo->prepare("SELECT prix_fcfa FROM produits WHERE id_product = ?");
            $stmtPrix->execute([$item['id']]);
            $produitBdd = $stmtPrix->fetch();
            if ($produitBdd) {
                $montant_total += $produitBdd['prix_fcfa'] * $item['quantite'];
            }
        }

        // 3. Insertion de la commande principale
        $adresse_complete = "Ville: " . $ville . " | Adresse: " . $adresse;
        $magasin = ($ville === 'Pointe-Noire') ? 'Grand Marché' : 'Centre-Ville';

        $stmtCmd = $pdo->prepare("INSERT INTO commandes (id_utilisateur, magasin_origine, mode_retrait, adresse_precise, mode_paiement, montant_total) VALUES (?, ?, ?, ?, ?, ?)");
        $stmtCmd->execute([$id_utilisateur, $magasin, $mode_retrait, $adresse_complete, $mode_paiement, $montant_total]);
        $id_commande = $pdo->lastInsertId();

        // 4. Insertion des détails de chaque produit de la commande
        $stmtDetail = $pdo->prepare("INSERT INTO details_commande (id_commande, id_product, quantite, prix_unitaire_fcfa) VALUES (?, ?, ?, ?)");
        foreach ($panier as $item) {
            $stmtPrixItem = $pdo->prepare("SELECT prix_fcfa FROM produits WHERE id_product = ?");
            $stmtPrixItem->execute([$item['id']]);
            $p = $stmtPrixItem->fetch();
            if ($p) {
                $stmtDetail->execute([$id_commande, $item['id'], $item['quantite'], $p['prix_fcfa']]);
            }
        }

        // Si tout s'est bien passé, on valide définitivement la transaction
        $pdo->commit();

        // Redirection vers la page de succès avec le numéro de commande
        header("Location: confirmation.php?commande_id=" . $id_commande);
        exit();

    } catch (Exception $e) {
        $pdo->rollBack(); // Annulation en cas de bug réseau ou coupure de courant
        die("Une erreur technique est survenue lors de l'enregistrement : " . $e->getMessage());
    }
} else {
    header("Location: index.php");
    exit();
}
?>
