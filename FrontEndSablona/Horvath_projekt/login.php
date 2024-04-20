<?php
require_once 'user_manager.php';  

session_start();  // It's a good practice to start the session at the beginning of the script

$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($username) && !empty($password)) {
        $userManager = new UserManager();
        if ($userManager->login($username, $password)) {
            $_SESSION['username'] = $username;  // Store username in session variable
            header("Location: index.php");  // Redirect to 'index.php' after login
            exit();  // Always call exit after header redirection to stop script execution
        } else {
            $message = "Invalid username or password.";  // Provide feedback for failed login
        }
    } else {
        $message = "Both username and password are required.";  // Feedback for empty fields
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
