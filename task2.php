<?php
session_start();
$email = isset($_COOKIE['email']) ? $_COOKIE['email'] : ''; // Get saved email if exists
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
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

        .login-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            width: 350px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            font-weight: 600;
            color: #333;
        }

        label {
            font-size: 16px;
            font-weight: 400;
            color: #444;
            display: block;
            text-align: left;
            margin-bottom: 5px;
        }

        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        input[type="checkbox"] {
            margin-right: 5px;
        }

        .remember-me {
            font-size: 14px;
            color: #444;
        }

        button {
            width: 100%;
            background: #4facfe;
            color: white;
            border: none;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s ease-in-out;
        }

        button:hover {
            background: #00c6ff;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Login</h2>
        <form action="login2.php" method="POST">
            <label>Email:</label>
            <input type="email" name="email" value="<?= htmlspecialchars($email) ?>" required>

            <label>Password:</label>
            <input type="password" name="password" required>

            <label class="remember-me">
                <input type="checkbox" name="remember" <?php if($email) echo "checked"; ?>> Remember Me
            </label>

            <button type="submit">Login</button>
        </form>
    </div>

</body>
</html>
