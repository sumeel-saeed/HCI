<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Quiz Score</title>
<style>
        body {
            text-align: center;
        }
 
        .score-container {
            margin-top: 20px;
        }
</style>
</head>
<body>
 
<h2>Quiz Score</h2>
 
<?php
// Hardcoded correct answers (replace with your actual correct answers)
$correctAnswers = [
    "paris",     // Correct answer for Question 1
    "mars",      // Correct answer for Question 2
    "bluewhale", // Correct answer for Question 3
    "shakespeare", // Correct answer for Question 4
    "tokyo",     // Correct answer for Question 5
];
 
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userAnswers = [
        $_POST["q1"],
        $_POST["q2"],
        $_POST["q3"],
        $_POST["q4"],
        $_POST["q5"],
    ];
 
    // Calculate the score
    $score = 0;
    for ($i = 0; $i < 5; $i++) {
        if (isset($userAnswers[$i]) && $userAnswers[$i] == $correctAnswers[$i]) {
            $score++;
        }
    }
 
    echo "<div class='score-container'>";
    echo "<p>Your Score: $score out of 5</p>";
    echo "</div>";
}
?>
 
</body>
</html>