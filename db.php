<?php
// db.php (Version Finale Clever Cloud Connectée)

$host = '://clever-cloud.com'; 
$dbname = 'bt3e3ek2thxfoiwadcjb'; 
$username = 'u7jckigghgxmlglf'; 

// REGARDE SUR TON ÉCRAN DE PC : Descends un tout petit peu la page 
// pour copier le texte de la case "Password" et colle-le à la place de la ligne ci-dessous
$password = 'METS_ICI_LE_PASSWORD_DE_TON_ECRAN';     

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
