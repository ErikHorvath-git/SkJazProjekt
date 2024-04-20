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
        // Attempt to log in as a regular user
        $stmt = $this->pdo->prepare("SELECT password FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch();
    
        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['is_admin'] = false;
            return 'user';
        }
    
        // If not found in users, check if the user is an admin
        $stmt = $this->pdo->prepare("SELECT password FROM admin WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $admin = $stmt->fetch();
    
        if ($admin && password_verify($password, $admin['password'])) {
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['is_admin'] = true;
    
            // Redirect to index.php if the user is an admin
            header("Location: index.php");
            exit();
        }
    
        // Return false if the login is unsuccessful for both user and admin
        return false;
    }
    
    public function registerAdmin($username, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->pdo->prepare("INSERT INTO admin (username, password, permissions) VALUES (:username, :password, b'1')");
        
        return $stmt->execute([
            'username' => $username,
            'password' => $hashedPassword
        ]);
    }
    
    
}
