<?php
// db.php (Version Définitive Corrigée pour Clever Cloud)

$host = '://clever-cloud.com'; 
$dbname = 'bt3e3ek2thxfoiwadcjb'; 
$username = 'u7jckigghgxmlglf'; 

// ICI : Mets ton vrai mot de passe en minuscules (celui de ta case Password Clever Cloud)
$password = 'METS_TON_PASSWORD_ICI';     

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
