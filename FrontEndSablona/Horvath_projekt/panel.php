<?php
class ProductManager {
    
    private $pdo;

    public function __construct() {
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

    public function listProducts() {
        $stmt = $this->pdo->query("SELECT id, name, price, picture, description FROM products");
        return $stmt->fetchAll();
    }

    public function getProduct($id) {
        $stmt = $this->pdo->prepare("SELECT id, name, price, picture, description FROM products WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function createProduct($name, $price, $picture, $description) {
        $blob = fopen($picture['tmp_name'], 'rb'); //  read-binary
        $stmt = $this->pdo->prepare("INSERT INTO products (name, price, picture, description) VALUES (?, ?, ?, ?)");
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $price);
        $stmt->bindParam(3, $blob, PDO::PARAM_LOB);
        $stmt->bindParam(4, $description);
        $stmt->execute();
    }
    
    public function updateProduct($id, $name, $price, $picture, $description) {
        $blob = fopen($picture['tmp_name'], 'rb'); // read-binary 
        $stmt = $this->pdo->prepare("UPDATE products SET name = ?, price = ?, picture = ?, description = ? WHERE id = ?");
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $price);
        $stmt->bindParam(3, $blob, PDO::PARAM_LOB);
        $stmt->bindParam(4, $description);
        $stmt->bindParam(5, $id);
        $stmt->execute();
    }

    public function deleteProduct($id) {
        $stmt = $this->pdo->prepare("DELETE FROM products WHERE id = ?");
        $stmt->execute([$id]);
    }
}

$manager = new ProductManager();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['create']) && isset($_FILES['picture']) && isset($_POST['description'])) {
        $manager->createProduct($_POST['name'], $_POST['price'], $_FILES['picture'], $_POST['description']);
    } elseif (isset($_POST['update']) && isset($_FILES['picture']) && isset($_POST['description'])) {
        $manager->updateProduct($_POST['id'], $_POST['name'], $_POST['price'], $_FILES['picture'], $_POST['description']);
    } elseif (isset($_POST['delete'])) {
        $manager->deleteProduct($_POST['id']);
    }
}

$products = $manager->listProducts();
?>

