<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        header("Location: dashboard.html");
        exit();
    } else {
        echo "<p style='color:red; text-align:center;'>Invalid Email or Password</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

    <div class="logo-container">
        <img src="image/logo-1.png" alt="Logo">
    </div>

    
        <div class="welcome-text">
            <h1>Welcome to BOCC Elementary School</h1>
            <p>Login to access your account</p>
        </div>

        <form method="POST">
        <div class="form-container">
            <h2>Login</h2>
        
                <div class="input-group">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="input-group">
                    <button type="submit" class="btn">Login</button>
                </div>
                <div class="input-group">
                    <p>Don't have an account? <a href="register.php">Register</a></p>
                </div>
            </div>
            
        </form>
    </div>
</body>
</html>
