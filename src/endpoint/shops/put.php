<?php
require_once '/home/api-magasinconnecte/www/src/cors.php';
require_once '/home/api-magasinconnecte/www/src/repository/ShopsRepository.php';

$data = json_decode(file_get_contents('php://input'), true);

if (!is_array($data)) {
    header('Content-Type: application/json');
    echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
    exit;
}

$repository = new ShopsRepository();

foreach ($data as $shopData) {
    $weeks = $shopData['weeks'] ?? [];

    $repository->updateShop($weeks);
}

header('Content-Type: application/json');
echo json_encode(['status' => 'success']);
?>