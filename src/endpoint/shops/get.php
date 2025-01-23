<?php
require_once '/home/api-magasinconnecte/www/src/cors.php';
require_once '/home/api-magasinconnecte/www/src/repository/ShopsRepository.php';

$repository = new ShopsRepository();

if (isset($_GET['number'])) {
    $shop = $repository->getShopByNumber($_GET['number']);
    $response = $shop ?: ['error' => 'Shop not found'];
} else {
    $response = $repository->getAllShops();
}

header('Content-Type: application/json');
echo json_encode($response);
?>