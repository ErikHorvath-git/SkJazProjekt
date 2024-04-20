<?php
require_once 'user_manager.php';

$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($username) && !empty($password)) {
        $userManager = new UserManager();
        if ($userManager->register($username, $password)) {
            $message = "User registered successfully!";
        } else {
            $message = "Failed to register user.";
        }
    } else {
        $message = "Username and password cannot be empty.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <p><?php echo $message; ?></p>
    <form method="post">
        Username: <input type="text" name="username" required>
        Password: <input type="password" name="password" required>
        <input type="submit" value="Register">
    </form>
</body>
</html>

