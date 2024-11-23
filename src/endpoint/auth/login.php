<?php
require_once '/home/api-magasinconnecte/www/src/cors.php';
require_once '/home/api-magasinconnecte/www/src/repository/UsersRepository.php';

$data = json_decode(file_get_contents('php://input'), true);
$username = $data['email'] ?? '';
$password = $data['password'] ?? '';

$repository = new UsersRepository();
$user = $repository->getUserByUsername($username);

if ($user && $user['password'] === $password) {
    $response = ['email' => $user['email'], 'password' => $user['password'], 'role' => $user['role']];
} else {
    $response = ['status' => 'error', 'message' => 'Invalid email or password'];
}

header('Content-Type: application/json');
echo json_encode($response);
?>