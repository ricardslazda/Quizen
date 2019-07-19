<?php $isLoggedIn = \Quiz\Session::getInstance()->get("loggedIn"); ?>
<div class="admin-content">
    <?php if(!$isLoggedIn) { ?>
    <form action="/admin/verify" method="post" class="login">
        <p class="login__label">Username</p>
        <input type="text" name="username" placeholder="Enter your username" required class="input login__input">
        <br/>
        <p class="login__label">Password</p>
        <input type="password" name="password" placeholder="Enter your password" class="input login__input" required>
        <br/>
        <input type="submit" value="Login" class="button button--small login__button">
    </form>
    <?php }else{?>
        <h1 class="title">You are logged in!</h1>
    <?php } ?>
</div>