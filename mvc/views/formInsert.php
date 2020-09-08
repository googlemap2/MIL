<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Song</title>
    <link href='/MIL/css/main.css' rel='stylesheet'/>
</head>
<?php
    require_once "./mvc/core/DB.php";
    require_once "./mvc/core/controller.php";
    $db =new DB();
    $control= new controller();
    
   $categories ="select * from categories"; 
    if($result=mysqli_query($db->conn,$categories)){
        $list=$result->fetch_all();  
    }  

    if(!isset($_SESSION['user']) || $_SESSION['user']==""){
       $control->_header("login");
    }
    if(isset($data['error'])&&$data['error']!=""){
        echo "<script>alert('$data[error]')</script>";
    }
?>
<body>
    <div class="wrapper-insert">
        <form action="/MIL/insert/excuteInsert" method="post" enctype="multipart/form-data" class="insert-contains">
            <h3 class="title-insert ">INSERT SONG</h3>
            <div class="info-insert">
            <h2>Name Song</h2>
                <input type="text" placeholder="Enter Name Song" name="nameSong" required/>
                <h2>Singer</h2>
                <input type="text" placeholder="Enter Name Song" name="singer"/>
                <h2>Categories</h2>
               <select name="categories">
                   <?php
                   foreach($list as $key=>$values)
                   echo "<option value='$values[0]'>$values[1]</option>";
                   ?>
               </select>
                <h2>Poster Song</h2>
                <input type="file" name="posterSong" required   />
                <h2>Song</h2>
                <input type="file" name="song" required/>
                <input type="submit" value="Create" name="submitInsert">
                <a href="/MIL/home">
                    home
                </a>
            </div>
        </form>
    </div>
    
</body></html>