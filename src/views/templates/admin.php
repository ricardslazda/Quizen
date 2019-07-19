<?php $isLoggedIn = \Quiz\Session::getInstance()->get("loggedIn"); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quizen | Admin Panel</title>
    <link rel="stylesheet" href="../assets/css/style.css"
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="icon" href="assets/images/logo.png">
</head>
<body>
<div class="admin">
    <div class="admin-sidenav">
        <a href="/admin" class="admin-sidenav__select sidenav__select--admin">Admin Panel</a>
        <div class="admin-sidenav__separator"></div>
        <?php if($isLoggedIn) { ?>
        <a href="/admin/quizzes" class="admin-sidenav__select">Topics</a>
        <a href="/admin/questions" class="admin-sidenav__select">Questions</a>
        <a href="/admin/answers" class="admin-sidenav__select">Answers</a>
        <a href="/admin/answer-log" class="admin-sidenav__select">Answer Log</a>
        <div class="admin-sidenav__separator"></div>
        <a href="/admin/logout" class="admin-sidenav__select">Log out</a>
        <?php } ?>
    </div>
<?= $content ?? ''; ?>
</div>
</body>
</html>
