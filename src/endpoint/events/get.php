<?php
require_once '/home/api-magasinconnecte/www/src/cors.php';
require_once '/home/api-magasinconnecte/www/src/repository/EventsRepository.php';

$repository = new EventsRepository();
$events = $repository->getAllEvents();

header('Content-Type: application/json');
echo json_encode($events);
?>