<?php
class Database {
    private static $instance = null;
    private $pdo;

    private function __construct() {
        $host = 'localhost';
        $dbname = 'test';
        $user = 'root';
        $pass = '';
        try {
            $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
            $this->pdo = new PDO($dsn, $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getPDO() {
        return $this->pdo;
    }
}
