<?php
// db.php (Version Définitive sans erreur de frappe)

$host = '://clever-cloud.com'; 
$dbname = 'bt3e3ek2thxfoiwadcjb'; 
$username = 'u7jckigghgxmlglf'; 

// Remplace uniquement le texte ci-dessous par ton vrai mot de passe en minuscules
$password = 'METS_TON_PASSWORD_ICI';     

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
