<?php
require_once '/home/api-magasinconnecte/www/src/cors.php';
require_once '/home/api-magasinconnecte/www/src/repository/ShopsRepository.php';

$repository = new ShopsRepository();
$shops = $repository->getAllShops();

header('Content-Type: application/json');
echo json_encode($shops);
?>