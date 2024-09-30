<?php
session_start();
include 'data.php';

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$user = [
    'name' => $_SESSION['username'],
    'points' => isset($_SESSION['points']) ? $_SESSION['points'] : 0,
    'level' => 5,
    'completed_tasks' => 20
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Dashboard</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="leaderboard.php">Leaderboard</a>
            <a href="game.php">Play Game</a>
        </nav>
    </header>
    <main>
        <h2>Progress</h2>
        <p>Points: <?php echo $user['points']; ?></p>
        <p>Level: <?php echo $user['level']; ?></p>
        <p>Completed Tasks: <?php echo $user['completed_tasks']; ?></p>
    </main>
</body>
</html>
