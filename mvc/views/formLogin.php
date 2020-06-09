<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <div class="wrapper-login">
        <img src="/MIL/img/loginIMG.png" class="imgLogin" />
        <form action="./login/excuteLogin" method="post" class="login-contains">
            <h2>Login</h2>
            <span>UserName</span>
            <input type="text" placeholder="Enter UserName" name="username" class="input-fix" required>
            <span>Password</span>
            <input type="password" placeholder="Enter Password" name="password" class="input-fix" required>
            <input type="submit" value="Signin" name="submit" class="submit-login"/>
            <div class="link">
                <a href='http://localhost/MIL/home'>
                    Home
                </a>
                <a href="http://localhost/MIL/register">
                    Register Now
                    <?php
                    ?>
                </a>
            </div>
        </form>
    </div>
</body></html>