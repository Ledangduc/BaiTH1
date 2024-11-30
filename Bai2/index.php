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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .question-container {
            margin-bottom: 20px;
        }
        .question {
            font-weight: bold;
        }
        .choices {
            margin-left: 20px;
        }
        .choices input {
            margin-right: 10px;
        }
        .submit-btn {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Quiz</h1>
    <form action="submit.php" method="post">
        <?php foreach ($questions as $index => $q): ?>
            <div class="question-container">
                <div class="question"><?= ($index + 1) . '. ' . $q['question']; ?></div>
                <div class="choices">
                    <?php foreach ($q['choices'] as $choice): ?>
                        <label>
                            <input type="radio" name="question-<?= $index; ?>" value="<?= $choice[0]; ?>">
                            <?= $choice; ?>
                        </label><br>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
        <button class="submit-btn" type="submit">Submit</button>
    </form>
</body>
</html>
