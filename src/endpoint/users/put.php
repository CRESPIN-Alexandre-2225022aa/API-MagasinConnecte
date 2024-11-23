<?php
require_once '/home/api-magasinconnecte/www/src/cors.php';
require_once '/home/api-magasinconnecte/www/src/repository/UsersRepository.php';

$data = json_decode(file_get_contents('php://input'), true);
if(!$data) {
    header('Content-Type: application/json');
    echo json_encode(['status' => 'error']);
    exit;
}

$id = $data['id'] ?? '';
$email = $data['email'] ?? '';
$password = $data['password'] ?? '';
$role = $data['role'] ?? '';

$repository = new UsersRepository();


if ($id === '') {
    $id = $repository->getUserByUsername($email)['id'];
}
$repository->updateUser($id, $email, $password, $role);

header('Content-Type: application/json');
echo json_encode(['status' => 'success']);
?>