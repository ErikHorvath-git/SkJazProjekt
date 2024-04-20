<?php
require_once 'user_manager.php';  

session_start();  

$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($username) && !empty($password)) {
        $userManager = new UserManager();
        if ($userManager->login($username, $password)) {
            $_SESSION['username'] = $username;  
            header("Location: index.php");  
            exit();  
        } else {
            $message = "Invalid username or password.";  
        }
    } else {
        $message = "Both username and password are required.";  
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <p><?php echo $message; ?></p>
    <form method="post" action="login.php">
        Username: <input type="text" name="username" required>
        Password: <input type="password" name="password" required>
        <input type="submit" value="Login">
    </form>
</body>
</html>
