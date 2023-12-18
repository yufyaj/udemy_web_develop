<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="questions.js" defer></script>
    <title>問題<?php echo $formattedData["id"];?> | Quiz</title>
</head>
<body>
    <div id="main">
        <h1>Quiz</h1>
        <div class="section">
            <h2>問題<?php echo $formattedData["id"];?></h2>
            <p>
                <?php echo $formattedData["question"]; ?>
            </p>
            <h3>選択肢</h3>
            <ol class="answers" data-questionId=<?php echo $formattedData["id"]; ?>>
                <?php foreach($formattedData["answers"] as $key => $value): ?>
                    <li data-answer=<?php echo $key; ?>><?php echo $value;?></li>
                <?php endforeach; ?>
            </ol>
        </div>

        <div id="section-correct-answer">
            <h2><span class="correct-answer">答え</span></h2>
            <span id="correctAnswerValue"></span><br>
            <span id="explanation"></span>
        </div>

        <div class="section">
            <a href="index.php">戻る</a>
        </div>
</div>
</body>
</html>