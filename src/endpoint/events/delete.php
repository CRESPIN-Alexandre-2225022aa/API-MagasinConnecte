<?php
require_once '/home/api-magasinconnecte/www/src/cors.php';
require_once '/home/api-magasinconnecte/www/src/repository/EventsRepository.php';

$id = $_GET['id'] ?? '';

if (!$id) {
    header('Content-Type: application/json');
    echo json_encode(['status' => 'error', 'message' => 'Missing id']);
    exit;
}

$repository = new EventsRepository();
$repository->deleteEvent($id);

header('Content-Type: application/json');
echo json_encode(['status' => 'success']);
?>