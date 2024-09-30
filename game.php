<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Simple quiz data
$questions = [
    ['question' => 'What is the capital of France?', 'options' => ['Paris', 'London', 'Berlin'], 'answer' => 'Paris'],
    ['question' => 'What is 2 + 2?', 'options' => ['3', '4', '5'], 'answer' => '4'],
    ['question' => 'Which planet is known as the Red Planet?', 'options' => ['Earth', 'Mars', 'Jupiter'], 'answer' => 'Mars'],
    ['question' => 'Who wrote "Romeo and Juliet"?', 'options' => ['William Shakespeare', 'Charles Dickens', 'J.K. Rowling'], 'answer' => 'William Shakespeare'],
    ['question' => 'What is the largest ocean on Earth?', 'options' => ['Atlantic Ocean', 'Indian Ocean', 'Pacific Ocean'], 'answer' => 'Pacific Ocean'],
    ['question' => 'What is the smallest prime number?', 'options' => ['0', '1', '2'], 'answer' => '2'],
    ['question' => 'Who painted the Mona Lisa?', 'options' => ['Leonardo da Vinci', 'Vincent van Gogh', 'Pablo Picasso'], 'answer' => 'Leonardo da Vinci'],
    ['question' => 'What is the chemical symbol for water?', 'options' => ['H2O', 'O2', 'CO2'], 'answer' => 'H2O'],
    ['question' => 'In which continent is the Sahara Desert located?', 'options' => ['Asia', 'Africa', 'Australia'], 'answer' => 'Africa'],
    ['question' => 'Who was the first president of the United States?', 'options' => ['George Washington', 'Thomas Jefferson', 'Abraham Lincoln'], 'answer' => 'George Washington'],
    ['question' => 'What is the largest mammal in the world?', 'options' => ['Elephant', 'Blue Whale', 'Giraffe'], 'answer' => 'Blue Whale'],
    ['question' => 'Which country is known as the Land of the Rising Sun?', 'options' => ['China', 'Japan', 'South Korea'], 'answer' => 'Japan'],
    ['question' => 'What is the main ingredient in guacamole?', 'options' => ['Tomato', 'Avocado', 'Potato'], 'answer' => 'Avocado'],
    ['question' => 'What is the hardest natural substance on Earth?', 'options' => ['Gold', 'Iron', 'Diamond'], 'answer' => 'Diamond'],
    ['question' => 'What is the capital of Italy?', 'options' => ['Rome', 'Venice', 'Milan'], 'answer' => 'Rome']
];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $score = 0;
    foreach ($questions as $index => $question) {
        if (isset($_POST['q' . $index]) && $_POST['q' . $index] == $question['answer']) {
            $score++;
        }
    }
 // Update user points in session
    if (!isset($_SESSION['points'])) {
        $_SESSION['points'] = 0;
    }
    $_SESSION['points'] += $score * 10; // Example: each correct answer gives 10 points

    // Show the score
    echo '<p>Your score: ' . $score . '/' . count($questions) . '</p>';

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Play Game</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Quiz Game</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="dashboard.php">Dashboard</a>
            <a href="leaderboard.php">Leaderboard</a>
        </nav>
    </header>
    <main>
        <form method="POST" action="">
            <?php foreach ($questions as $index => $question) : ?>
                <fieldset>
                    <legend><?php echo $question['question']; ?></legend>
                    <?php foreach ($question['options'] as $option) : ?>
                        <label>
                            <input type="radio" name="q<?php echo $index; ?>" value="<?php echo $option; ?>">
                            <?php echo $option; ?>
                        </label><br>
                    <?php endforeach; ?>
                </fieldset>
            <?php endforeach; ?>
            <button type="submit">Submit</button>
        </form>
    </main>
</body>
</html>
