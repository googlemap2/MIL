<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href='./css/main.css' rel='stylesheet'/>
</head>

<body>
    <div class="wrapper-login">
        <img src="/MIL/img/loginIMG.png" class="imgLogin" />
        <form action="./register/excuteRegister" method="post" class="login-contains">
            <h2>Login</h2>
            <span>UserName</span>
            <input type="text" placeholder="Enter UserName" name="username" class="input-fix" require>
            <span>Password <?php echo isset($data['password'])?"<span style='color:red;display: inline;    font-size: 0.8em; font-family: sans-serif;'>".$data['password']."</span>":"" ?></span>
            <input type="text" placeholder="Enter Password" name="password" class="input-fix" require>
             <span>Repass <?php echo  isset($data['repass'])?"<span style='color:red;display: inline;    font-size: 0.8em; font-family: sans-serif;'>".$data['repass']."</span>":"" ?></span>
            <input type="text" placeholder="Enter Repass" name="repass"class="input-fix"  require>
             <span>Email <?php echo  isset($data['email'])?"<span style='color:red;display: inline;    font-size: 0.8em; font-family: sans-serif;'>".$data['email']."</span>":"" ?></span>
            <input type="text" placeholder="Enter Email" name="email"class="input-fix"  require>
            <input type="submit" value="Register" name="submitR"  class="submit-login submit-register"/>
            <div class="link link-register">
                <a href="http://localhost/MIL/home">
                    Home
                </a>
                <a href="http://localhost/MIL/login">
                   Login
                </a>
            </div>
        </form>
    </div>
</body></html>