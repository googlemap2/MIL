<?php
session_start();
require_once "DB.php";
if(isset($_GET["nameSong"]) && isset($_GET["playlist"])){
    $nameSong = $_GET["nameSong"];
    $playlist = $_GET["playlist"];
    $user = $_SESSION['user'];
    $db= new DB();
    $insert="INSERT INTO `infoplaylist`(`id_playlist`, `ID_Song`) VALUES ('$playlist','$nameSong')";
    if($db->conn->query($insert)){
        echo "Thêm nhạc thành công";
    }else{
        echo "Thêm nhạc thất bại";
    }
    }
?>
