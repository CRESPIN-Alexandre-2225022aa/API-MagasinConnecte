<?php

class User {
    public int $id;
    public string $email;
    public string $password;
    public string $role;

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