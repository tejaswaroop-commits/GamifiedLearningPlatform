<?php
session_start();
include 'data.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        $error = 'Passwords do not match.';
    } else {
        // Check if username already exists
        if (isset($users[$username])) {
            $error = 'Username already exists.';
        } else {
            // Add user to mock data
            $users[$username] = password_hash($password, PASSWORD_DEFAULT);
            file_put_contents('data.php', '<?php $users = ' . var_export($users, true) . '; ?>');
            $_SESSION['username'] = $username;
            header('Location: dashboard.php');
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Center the signup form */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #ff6f61, #ffcb77, #7f5fc8);
            background-size: 600% 600%;
            animation: gradientBG 15s ease infinite;
            font-family: 'Press Start 2P', cursive;
        }

        header {
            position: absolute;
            top: 20px;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.7);
            color: #fff;
            padding: 10px 0;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            font-size: 18px; /* Reduced font size */
        }

        header h1 {
            margin: 0;
        }

        nav a {
            color: #fff;
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px; /* Reduced font size */
            position: relative;
            transition: color 0.3s, transform 0.3s, background-color 0.3s;
            padding: 5px 10px;
            border-radius: 5px;
        }

        nav a::after {
            content: '';
            display: block;
            height: 2px;
            background: #fff;
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            transition: width 0.3s;
        }

        nav a:hover {
            color: #a2c2e0;
            background-color: #fff;
            transform: scale(1.05);
        }

        nav a:hover::after {
            width: 100%;
        }

        main {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            padding: 30px;
            width: 100%;
            max-width: 400px; /* Adjust as needed */
            box-sizing: border-box;
            text-align: center;
        }

        main h2 {
            margin-top: 0;
            color: #333;
        }

        main label {
            display: block;
            margin: 10px 0 5px;
            font-size: 14px;
            color: #333;
        }

        main input {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        main button {
            background: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            width: 100%;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s, transform 0.3s;
        }

        main button:hover {
            background: #0056b3;
            transform: scale(1.05);
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 0%; }
            50% { background-position: 100% 100%; }
            100% { background-position: 0% 0%; }
        }
    </style>
</head>
<body>
    <header>
        <h1>Gamified Learning Platform</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="login.php">Login</a>
        </nav>
    </header>
    <main>
        <h2>Sign Up</h2>
        <form method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <button type="submit">Sign Up</button>
            <?php if (isset($error)) : ?>
                <p class="error"><?php echo $error; ?></p>
            <?php endif; ?>
        </form>
    </main>
</body>
</html>
