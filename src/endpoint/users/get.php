<?php
require_once '/home/api-magasinconnecte/www/src/cors.php';
require_once '/home/api-magasinconnecte/www/src/repository/UsersRepository.php';

$repository = new UsersRepository();
$users = $repository->getAllUsers();

header('Content-Type: application/json');
echo json_encode($users);
?>