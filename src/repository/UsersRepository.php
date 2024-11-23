<?php
require_once '/home/api-magasinconnecte/www/src/models/User.php';
require_once '/home/api-magasinconnecte/www/src/connector/JsonConnector.php';

class UsersRepository {
    private $connector;

    public function __construct() {
        $this->connector = new JsonConnector('/home/api-magasinconnecte/www/src/data/user.json');
    }

    public function getAllUsers() {
        return $this->connector->read();
    }

    public function addUser($email, $password, $role): void {
        $users = $this->connector->read();
        $id = count($users) ? $users[count($users) - 1]['id'] + 1 : 1;
        $user = new User($id, $email, $password, $role);
        $users[] = $user->toArray();
        $this->connector->write($users);
    }

    public function updateUser($id, $email, $password, $role): void {
        $users = $this->connector->read();
        foreach ($users as &$u) {
            if ($u['id'] == $id) {
                $user = new User($id, $email, $password, $role);
                $u = $user->toArray();
                break;
            }
        }
        $this->connector->write($users);
    }

    public function deleteUser($id): void {
        $users = $this->connector->read();
        $users = array_filter($users, function($u) use ($id) {
            return $u['id'] != $id;
        });
        $this->connector->write($users);
    }

    public function getUserByUsername($email) {
        $users = $this->connector->read();
        foreach ($users as $user) {
            if ($user['email'] === $email) {
                return $user;
            }
        }
        return null;
    }
}
?>