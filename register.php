<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    if ($stmt->execute([$name, $email, $password])) {
        echo "<p style='color:green; text-align:center;'>Registration successful! <a href='login.php'>Login here</a></p>";
    } else {
        echo "<p style='color:red; text-align:center;'>Something went wrong. Try again.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <link rel="stylesheet" href="register.css">
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
            <h2>Register</h2>
             <div class="input-group">
                    <input type="text" name="name" placeholder="Name" required>
                </div>
                <div class="input-group">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="input-group">
                    <button type="submit" class="btn">Register</button>
                </div>
                <div class="input-group">
                    <p>Already have an account? <a href="login.php">Register</a></p>
                </div>
            </div>

        </div>
    </form>

</body>
</html>
