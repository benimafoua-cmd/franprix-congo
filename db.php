<?php
$host = '://clever-cloud.com'; 
$dbname = 'bt3e3ek2thxfoiwadcjb'; 
$username = 'u7jckigghgxmlglf'; 

// COUPE ET COLLE LE CODE DE LA CASE PASSWORD DE CLEVER CLOUD ICI :
$password = 'uTfq98EATqXndGlndBQG';     

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
