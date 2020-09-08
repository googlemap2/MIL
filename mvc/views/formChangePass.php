<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href='/MIL/css/main.css' rel='stylesheet'/>
</head>

<body>
    <div class="wrapper-login">
        <form action="/MIL/changepassword/excuteChange" method="post" class="login-contains">
        <img src="/MIL/img/loginIMG.png" class="imgLogin" />
            <h2>Change Password</h2>
            <span><?php
            if(isset($data["error"])){
                echo $data["error"];
            }
            else{
                echo $data["user"];
            }
            ?></span>
            <span>Old Password </span>
            <input type="password" placeholder="Enter Password" name="oldPassword" class="input-fix" required>
            <span>New Password</span>
            <input type="password" placeholder="Enter Password" name="changePassword" class="input-fix" required>
            <?php
            if(!isset($data["error"])){
                echo  "<input type='submit' value='Change' name='submit' class='submit-login'/>";
            }
            ?>
            <div class="link">
                <a href='/MIL/home'>
                    Home
                </a>
            </div>
        </form>
    </div>
    
</body></html>