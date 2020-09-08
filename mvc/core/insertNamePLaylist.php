<?php
session_start();
require_once "DB.php";
if(isset($_GET["namePLaylist"]) && isset($_SESSION['user'])){
    $name = $_GET["namePLaylist"];
    $user = $_SESSION['user'];
    $idPlaylist=uniqid($name."_");
    $datepost=uniqid(date("Y-m-d h:i:s"));
    $db= new DB();
    $insert="INSERT INTO `playlist`(`id_playlist`, `id_account`, `namePlaylist`) VALUES ('$idPlaylist','$user','$name')";
    $checkName="select count(*) from playlist where id_account='$user' and namePlaylist='$name'";
    $count=$db->conn->query($checkName);
    $count=$count->fetch_all();
    if($count[0][0]==0){
        if ($db->conn->query($insert)){
            echo "Thêm playlist thành công";
        }else{
            echo "Thêm playlist thất bại";
        }
    }
    else{
        echo "Playlist đã tồn tại";
    }
}
else{
    echo"Bạn cần đăng nhập để sử dụng playlist";
}

?>