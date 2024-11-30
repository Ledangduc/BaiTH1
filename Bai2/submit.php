<?php
$questions = [];
$currentQuestion = null;
$lines = file('Quiz.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
foreach ($lines as $line) {
    if (strpos($line, 'ANSWER:') === 0) {
        $currentQuestion['answer'] = trim(substr($line, 8));
        $questions[] = $currentQuestion;
        $currentQuestion = null;
    } elseif (preg_match('/^[A-D]\./', $line)) {
        $currentQuestion['choices'][] = $line;
    } else {
        if ($currentQuestion) {
            $questions[] = $currentQuestion;
        }
        $currentQuestion = ['question' => $line, 'choices' => []];
    }
}
$score = 0;
$total = count($questions);

foreach ($questions as $index => $q) {
    if (isset($_POST["question-$index"]) && $_POST["question-$index"] === $q['answer']) {
        $score++;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
    </style>
</head>
<body>
    <h1>Quiz Result</h1>
    <p>Bạn đã trả lời đúng <?= $score; ?> / <?= $total; ?> câu hỏi.</p>
    <a href="index.php">Làm lại </a>
</body>
</html>
