<?php
require_once '/home/api-magasinconnecte/www/src/cors.php';
require_once '/home/api-magasinconnecte/www/src/repository/ShopsRepository.php';

$data = json_decode(file_get_contents('php://input'), true);
$weeks = $data['weeks'] ?? [];

$repository = new ShopsRepository();
$repository->addShop($weeks);

header('Content-Type: application/json');
echo json_encode(['status' => 'success']);
?>