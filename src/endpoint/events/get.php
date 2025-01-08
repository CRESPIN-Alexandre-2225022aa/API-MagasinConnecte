<?php
require_once '/home/api-magasinconnecte/www/src/cors.php';
require_once '/home/api-magasinconnecte/www/src/repository/EventsRepository.php';

$repository = new EventsRepository();

if (isset($_GET['id'])) {
    $event = $repository->getEventById($_GET['id']);
    $response = $event ?: ['error' => 'Event not found'];
} else {
    $response = $repository->getAllEvents();
}

header('Content-Type: application/json');
echo json_encode($response);
?>