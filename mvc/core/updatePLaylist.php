<?php
session_start();
require_once "DB.php";
if(isset($_GET["idPlaylist"]) && isset($_GET["nameUpdate"])){
    $id_playlist = $_GET["idPlaylist"];
    $nameUpdate =trim($_GET["nameUpdate"]," ");
    $user=$_SESSION["user"];
    $db= new DB();
    $updateNamePlaylist="update playlist set namePlaylist = '$nameUpdate' where id_playlist = '$id_playlist' ";
if($db->conn->query($updateNamePlaylist)){
    echo "Cập nhật thành công ";
}
else{
    echo "Cập nhật thất bại";
}

}
?>