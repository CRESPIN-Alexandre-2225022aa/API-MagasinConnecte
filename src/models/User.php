<?php

class User {
    public $id;
    public $email;
    public $password;
    public $role;

    public function __construct($id, $email, $password, $role) {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    public function toArray(): array {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'password' => $this->password,
            'role' => $this->role,
        ];
    }
}
?>