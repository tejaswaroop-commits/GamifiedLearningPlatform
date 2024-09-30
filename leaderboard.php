<?php
include 'data.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Leaderboard</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="dashboard.php">Dashboard</a>
        </nav>
    </header>
    <main>
        <h2>Top Users</h2>
        <ul>
            <?php foreach ($users as $user) : ?>
                <li><?php echo $user['name'] . ' - Points: ' . $user['points']; ?></li>
            <?php endforeach; ?>
        </ul>
    </main>
</body>
</html>
