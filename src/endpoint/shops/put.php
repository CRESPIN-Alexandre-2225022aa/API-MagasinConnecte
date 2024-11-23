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
    $id = $shopData['id'] ?? '';
    $name = $shopData['name'] ?? '';
    $description = $shopData['description'] ?? '';
    $address = $shopData['address'] ?? '';
    $images = $shopData['images'] ?? '';
    $social = $shopData['social'] ?? '';
    $linkTree = $shopData['linkTree'] ?? '';
    $currentWeek = $shopData['currentWeek'] ?? '';
    $nextWeek = $shopData['nextWeek'] ?? '';

    $repository->updateShop($id, $name, $description, $address, $images, $social, $linkTree, $currentWeek, $nextWeek);
}

header('Content-Type: application/json');
echo json_encode(['status' => 'success']);
?>