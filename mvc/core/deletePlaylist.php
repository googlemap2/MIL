<?php
session_start();
require_once "DB.php";
if(isset($_GET["idPlaylist"])){
    $id_playlist = $_GET["idPlaylist"];
    $user=$_SESSION["user"];
    $db= new DB();
    $delInfoPlaylist="delete from infoplaylist where id_playlist='$id_playlist'";
    $delPlaylist="delete from playlist where id_playlist='$id_playlist'";
if($db->conn->query($delInfoPlaylist) &&$db->conn->query($delPlaylist) ){
    echo "Xóa thành công";
}
else{
    echo "Xóa nhật thất bại";
}

}
?>