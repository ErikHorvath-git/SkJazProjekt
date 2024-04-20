<?php
require_once 'user_manager.php';

$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $isAdmin = isset($_POST['admin']); // Check if admin 

    if (!empty($username) && !empty($password)) {
        $userManager = new UserManager();
        if ($isAdmin) {
            // If the admin checkbox is checked
            if ($userManager->registerAdmin($username, $password)) {
                $message = "Admin registered successfully!";
            } else {
                $message = "Failed to register admin.";
            }
        } else {
            if ($userManager->register($username, $password)) {
                $message = "User registered successfully!";
            } else {
                $message = "Failed to register user.";
            }
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
        <label>
            Admin: <input type="checkbox" name="admin">
        </label>
        <input type="submit" value="Register">
    </form>
</body>
</html>
