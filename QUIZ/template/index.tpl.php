<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Quiz</title>
</head>
<body>
    <div id="main">
        <h1>Quiz</h1>
        <h2>問題一覧</h2>
        <ul>
            <?php foreach($ids as $id): ?>
            <li><a href=<?php echo "question.php?id=".$id; ?>><?php echo "問題".$id; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>