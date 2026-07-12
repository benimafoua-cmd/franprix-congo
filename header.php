<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Franprix Congo - E-commerce</title>
    <style>
        body { font-family: 'Segoe UI', system-ui, sans-serif; background-color: #f4f6f9; margin: 0; padding: 0; color: #333; }
        .container { width: 100%; max-width: 1200px; margin: 0 auto; padding: 0 15px; box-sizing: border-box; }
        .navbar { background-color: #FF6600; padding: 15px 0; box-shadow: 0 4px 12px rgba(0,0,0,0.1); position: sticky; top: 0; z-index: 1000; }
        .navbar .container { display: flex; justify-content: space-between; align-items: center; }
        .navbar-brand { color: #ffffff; font-weight: 800; text-decoration: none; font-size: 24px; letter-spacing: 1px; }
        .navbar-nav { list-style: none; display: flex; margin: 0; padding: 0; align-items: center; }
        .nav-item { margin-left: 20px; }
        .nav-link { color: rgba(255,255,255,0.9); text-decoration: none; font-weight: 600; font-size: 16px; }
        .nav-link:hover { color: #ffffff; text-decoration: underline; }
        .btn-light { background-color: #ffffff; color: #FF6600; font-weight: 700; border-radius: 8px; padding: 8px 16px; text-decoration: none; display: inline-flex; align-items: center; border: none; }
        .position-relative { position: relative; }
        .badge { background-color: #dc3545; color: white; border-radius: 50px; padding: 3px 7px; font-size: 12px; font-weight: bold; position: absolute; top: -8px; right: -8px; }
        .bg-franprix { background-color: #FF6600; color: white; text-align: center; padding: 4rem 2rem; border-radius: 12px; margin-bottom: 2rem; }
        .row { display: flex; flex-wrap: wrap; margin: 0 -15px; }
        .col { flex: 0 0 25%; max-width: 25%; padding: 15px; box-sizing: border-box; }
        .card { background: #ffffff; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); padding: 20px; display: flex; flex-direction: column; height: 100%; border: 1px solid #eef2f5; box-sizing: border-box; }
        .card-title { font-size: 16px; margin: 0 0 10px 0; color: #2c3e50; font-weight: bold; }
        .text-danger { color: #dc3545; font-weight: bold; font-size: 1.25rem; margin: 15px 0; }
        .mt-auto { margin-top: auto; }
        .btn-franprix { background-color: #FF6600; color: white; font-weight: 700; border: none; width: 100%; padding: 12px; border-radius: 8px; cursor: pointer; text-align: center; text-decoration: none; display: block; }
        .btn-franprix:hover { background-color: #e55c00; }
        .table { width: 100%; margin-bottom: 2rem; background-color: white; border-collapse: collapse; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        .table th, .table td { padding: 15px; border-bottom: 1px solid #dee2e6; text-align: left; }
        .table th { background-color: #212529; color: white; }
        .form-control, .form-select { width: 100%; padding: 12px; border: 1px solid #ced4da; border-radius: 6px; box-sizing: border-box; margin-bottom: 15px; font-size: 16px; }
        @media (max-width: 992px) { .col { flex: 0 0 50%; max-width: 50%; } }
        @media (max-width: 576px) { .col { flex: 0 0 100%; max-width: 100%; } .navbar-nav { display: none; } }
    </style>
</head>
<body>

<nav class="navbar shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="index.php">🛒 FRANPRIX CONGO</a>
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
            <li class="nav-item"><a class="nav-link" href="boutique.php">Nos Rayons</a></li>
            <li class="nav-item"><a class="nav-link" href="admin.php">Espace Admin</a></li>
        </ul>
        <div class="d-flex">
            <a href="panier.php" class="btn-light position-relative">
                Mon Caddie 
                <span id="badge-panier" class="badge">1</span>
            </a>
        </div>
    </div>
</nav>
<div class="container my-5">
