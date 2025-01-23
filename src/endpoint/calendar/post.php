<?php
require_once '/home/api-magasinconnecte/www/src/cors.php';
require_once '/home/api-magasinconnecte/www/src/repository/CalendarRepository.php';

$data = json_decode(file_get_contents('php://input'), true);
$year = $data['year'] ?? '';
$weeks = $data['weeks'] ?? [];

$repository = new CalendarRepository();

if ($year) {
    if (!$repository->alreadyExistYear($year)) {
        $repository->addYear($year);
    }
    foreach ($weeks as $week) {
        $repository->addWeek($year, $week);
    }
}

header('Content-Type: application/json');
echo json_encode(['status' => 'success']);
?>