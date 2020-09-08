<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href='/MIL/css/main.css' rel='stylesheet'/>
</head>

<?php
    if(isset($data["error"])){
       echo "<script>alert('".$data['error']."')</script>";
    }
?>

<body>
    <div class="wrapper-login">

        <form action="/MIL/login/excuteLogin" method="post" class="login-contains">
            <img src="/MIL/img/loginIMG.png" class="imgLogin" />
            <h2>Login</h2>
            <span>UserName</span>
            <input type="text" placeholder="Enter UserName" name="username" class="input-fix" required>
            <span>Password</span>
            <input type="password" placeholder="Enter Password" name="password" class="input-fix" required>
            <input type="submit" value="Signin" name="submit" class="submit-login" />
            <div class="link">
                <a href='/MIL/home'>
                    Home
                </a>
                <a href="/MIL/register">
                    Register Now
                </a>
            </div>
        </form>
    </div>
</body>

</html>