<?php
require_once '/home/api-magasinconnecte/www/src/cors.php';
require_once '/home/api-magasinconnecte/www/src/repository/EventsRepository.php';

$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'] ?? '';
$title = $data['title'] ?? '';
$description = $data['description'] ?? '';
$images = $data['images'] ?? '';
$links = $data['links'] ?? '';
$date = $data['date'] ?? '';
$time = $data['time'] ?? '';
$location = $data['location'] ?? '';

$repository = new EventsRepository();
$repository->updateEvent($id, $title, $description, $images, $links, $date, $time, $location);

header('Content-Type: application/json');
echo json_encode(['status' => 'success']);
?>