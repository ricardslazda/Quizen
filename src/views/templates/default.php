<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quizen | Coolest quizzes on the web</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" href="assets/images/logo.png">
</head>
<body>
<div id="app" class="landing">
    <div class="game-start">
    <img src="assets/images/logo.svg" alt="Quiz logo" class="landing__logo">
    <?= $content ?? ''; ?>
    </div>
</div>
<script src="assets/js/scripts.js"></script>
</body>
</html>
