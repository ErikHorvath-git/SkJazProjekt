<?php
require_once 'database.php';

class UserManager {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getPDO();
    }

    public function register($username, $password) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        if ($stmt->execute(['username' => $username, 'password' => $hashed_password])) {
            return true;
        }
        return false;
    }

    public function login($username, $password) {
        $stmt = $this->pdo->prepare("SELECT password FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['password'])) {
            return true;
        }
        return false;
    }
}
