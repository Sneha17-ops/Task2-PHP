<?php
session_start();

// Hardcoded credentials
$valid_email = "user@example.com";
$valid_password = "password123"; // Plain text for demo (not secure)

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $remember = isset($_POST["remember"]);

    // Verify email and password
    if ($email === $valid_email && $password === $valid_password) {
        $_SESSION["email"] = $email;

        if ($remember) {
            setcookie("email", $email, time() + (86400 * 30), "/"); // Set cookie for 30 days
        } else {
            setcookie("email", "", time() - 3600, "/"); // Clear cookie
        }

        header("Location: welcome.php");
        exit();
    } else {
        $error_message = "Invalid email or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Error</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <!-- Internal CSS -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(to right, #4facfe, #00f2fe);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .error-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            width: 350px;
            text-align: center;
        }

        h2 {
            margin-bottom: 15px;
            font-weight: 600;
            color: #333;
        }

        .error-message {
            background: #ff4d4d;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        a {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            background: #4facfe;
            color: white;
            padding: 10px;
            border-radius: 5px;
            transition: 0.3s ease-in-out;
        }

        a:hover {
            background: #00c6ff;
        }
    </style>
</head>
<body>

    <div class="error-container">
        <h2>Login Failed</h2>

        <?php if ($error_message): ?>
            <div class="error-message"><?= htmlspecialchars($error_message) ?></div>
        <?php endif; ?>

        <a href="task2.php">Try Again</a>
    </div>

</body>
</html>
