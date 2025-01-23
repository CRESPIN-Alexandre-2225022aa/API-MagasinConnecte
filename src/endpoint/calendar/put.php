<?php
require_once '/home/api-magasinconnecte/www/src/cors.php';
require_once '/home/api-magasinconnecte/www/src/repository/ShopsRepository.php';

$data = json_decode(file_get_contents('php://input'), true);

if (!is_array($data)) {
    header('Content-Type: application/json');
    echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
    exit;
}

$repository = new CalendarRepository();

$year = $data['year'] ?? '';
$weeks = $data['week'] ?? [];

if ($year) {
    if (!$repository->alreadyExistYear($year)) {
        header('Content-Type: application/json');
        echo json_encode(['status' => 'error', 'message' => 'Year dont exist']);
        exit;
    }
    foreach ($weeks as $week) {
        $repository->updateWeek($year, $week);
    }
}

header('Content-Type: application/json');
echo json_encode(['status' => 'success']);
?>