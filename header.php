<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Franprix Congo - E-commerce</title>
    <!-- Lien vers le CDN CSS de Bootstrap pour un design moderne -->
    <link href="https://jsdelivr.net" rel="stylesheet">
    <style>
        .bg-franprix { background-color: #FF6600 !important; }
        .text-franprix { color: #FF6600 !important; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-franprix shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">🛒 FRANPRIX CONGO</a>
        
        <div class="d-flex align-items-center">
            <!-- Lien vers la page du panier avec son badge numérique -->
            <a href="panier.php" class="btn btn-light position-relative me-3">
                Mon Panier 
                <span id="badge-panier" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">0</span>
            </a>
        </div>
    </div>
</nav>
