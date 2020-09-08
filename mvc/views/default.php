<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link href='/MIL/css/main.css' rel='stylesheet'/>
</head>

<body>
    <div class="wrapper" id="wrapper">
         <?php
        include_once "./mvc/views/viewmaster/header.php";
     ?> 
 <div class="innerwrap">
     <?php
        if( isset($_SESSION['user'])&&$_SESSION['user']=="admin"&&  isset($_SESSION['admin']) ){
            require_once "./mvc/views/viewmaster/formAdmin.php";
        }else{
            require_once "./mvc/views/viewmaster/listSong.php";
        }
     ?>
 
     </div>
    </div>
   
</body>


</html>