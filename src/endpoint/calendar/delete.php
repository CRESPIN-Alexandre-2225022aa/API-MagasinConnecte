<?php
require_once '/home/api-magasinconnecte/www/src/cors.php';
require_once '/home/api-magasinconnecte/www/src/repository/CalendarRepository.php';

$data = json_decode(file_get_contents('php://input'), true);
$year = $data['year'] ?? '';
$week = $data['week'] ?? '';

$repository = new CalendarRepository();
if ($year && $week) {
    $repository->deleteWeek($year, $week);
}
else {
    $repository->deleteYear($year);
}

header('Content-Type: application/json');
echo json_encode(['status' => 'success']);
?>