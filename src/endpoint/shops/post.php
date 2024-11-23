<?php
require_once '/home/api-magasinconnecte/www/src/cors.php';
require_once '/home/api-magasinconnecte/www/src/repository/ShopsRepository.php';

$data = json_decode(file_get_contents('php://input'), true);
$name = $data['name'] ?? '';
$description = $data['description'] ?? '';
$address = $data['address'] ?? '';
$images = $data['images'] ?? '';
$social = $data['social'] ?? '';
$linkTree = $data['linkTree'] ?? '';
$currentWeek = $data['currentWeek'] ?? '';
$nextWeek = $data['nextWeek'] ?? '';

$repository = new ShopsRepository();
$repository->addShop($name, $description, $address, $images, $social, $linkTree, $currentWeek, $nextWeek);

header('Content-Type: application/json');
echo json_encode(['status' => 'success']);
?>