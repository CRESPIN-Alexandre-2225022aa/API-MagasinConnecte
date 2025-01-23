<?php
require_once '/home/api-magasinconnecte/www/src/cors.php';
require_once '/home/api-magasinconnecte/www/src/repository/CalendarRepository.php';

$repository = new CalendarRepository();

$year = $_GET['year'] ?? '';
$week = $_GET['week'] ?? '';

if ($year && $week) {
    $response = $repository->getWeek($year, $week);
}
else if ($year) {
    $response = $repository->getYear($year);
}
else {
    $response = $repository->getCalendar();
}

header('Content-Type: application/json');
echo json_encode($response);
?>