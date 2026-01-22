<?php
// On définit l'URL du service backend (le nom "backend-service" sera géré par le réseau Docker/K8s)
$backend_url = "http://backend-service:8080/api/products";

// On tente de récupérer les données
$response = @file_get_contents($backend_url);

echo "<html><head><title>Docker Eval - Frontend</title></head><body>";
echo "<h1>Système de Gestion de Stock</h1>";

if ($response === FALSE) {
    echo "<p style='color:red;'>Erreur : Impossible de contacter le service backend.</p>";
} else {
    $products = json_decode($response);
    echo "<h3>Produits disponibles :</h3><ul>";
    foreach ($products as $p) {
        echo "<li>" . htmlspecialchars($p) . "</li>";
    }
    echo "</ul>";
}
echo "</body></html>";
?>