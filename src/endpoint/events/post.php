<?php
require_once '/home/api-magasinconnecte/www/src/cors.php';
require_once '/home/api-magasinconnecte/www/src/repository/EventsRepository.php';

$data = json_decode(file_get_contents('php://input'), true);
if (!$data) {
    header('Content-Type: application/json');
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
    exit;
}
$title = $data['title'] ?? '';
$description = $data['description'] ?? '';
$images = $data['images'] ?? '';
$links = $data['links'] ?? '';
$date = $data['date'] ?? '';
$time = $data['time'] ?? '';
$location = $data['location'] ?? '';

$repository = new EventsRepository();
try {
    $repository->addEvent($title, $description, $images, $links, $date, $time, $location);
} catch (Exception $e) {
    header('Content-Type: application/json');
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    exit;
}

header('Content-Type: application/json');
echo json_encode(['status' => 'success']);
?>