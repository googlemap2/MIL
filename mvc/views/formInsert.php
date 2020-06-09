<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Song</title>
</head>
<?php
    if(!isset($_SESSION['user']) || $_SESSION['user']==""){
        header('location:http://localhost/MIL/login');
    }
    if(isset($data['error'])&&$data['error']!=""){
        echo "<script>alert('$data[error]')</script>";
    }
?>
<body>
    <div class="wrapper-insert">
        <form action="./insert/excuteInsert" method="post" enctype="multipart/form-data" class="insert-contains">
            <h3 class="title-insert ">INSERT SONG</h3>
            <div class="info-insert">
            <h2>Name Song</h2>
                <input type="text" placeholder="Enter Name Song" name="nameSong" required/>
                <h2>Poster Song</h2>
                <input type="file" name="posterSong" required   />
                <h2>Song</h2>
                <input type="file" name="song" required/>
                <input type="submit" value="Create" name="submitInsert">
                <a href="#">
                    home
                </a>
            </div>
        </form>
    </div>
</body></html>