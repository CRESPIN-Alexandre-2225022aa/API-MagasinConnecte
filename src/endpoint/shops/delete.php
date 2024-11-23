<?php
require_once '/home/api-magasinconnecte/www/src/cors.php';
require_once '/home/api-magasinconnecte/www/src/repository/ShopsRepository.php';

$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'] ?? '';

$repository = new ShopsRepository();
$repository->deleteShop($id);

header('Content-Type: application/json');
echo json_encode(['status' => 'success']);
?>