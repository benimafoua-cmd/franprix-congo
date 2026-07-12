<?php include('db.php'); include('header.php');
$query = $pdo->query("SELECT c.*, u.nom_complet, u.telephone FROM commandes c JOIN utilisateurs u ON c.id_utilisateur = u.id_utilisateur ORDER BY c.date_commande DESC");
$commandes = $query->fetchAll();
?>
<div class="container my-5">
    <h2 class="fw-bold mb-4">📋 Commandes reçues (Bureau Top / Franprix)</h2>
    <table class="table bg-white shadow-sm rounded">
        <thead class="table-dark"><tr><th>N°</th><th>Client</th><th>Adresse / Mode</th><th>Total</th><th>Moyen</th><th>Statut</th></tr></thead>
        <tbody>
        <?php foreach ($commandes as $c): ?>
            <tr><td>#FP-<?php echo $c['id_commande']; ?></td><td><b><?php echo htmlspecialchars($c['nom_complet']); ?></b><br><?php echo htmlspecialchars($c['telephone']); ?></td><td><?php echo htmlspecialchars($c['adresse_precise']); ?></td><td class="text-danger fw-bold"><?php echo $c['montant_total']; ?> FCFA</td><td><?php echo $c['mode_paiement']; ?></td><td><span class="badge bg-warning"><?php echo $c['statut_commande']; ?></span></td></tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include('footer.php'); ?>
