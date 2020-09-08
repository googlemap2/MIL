<?php
session_start();
require_once "DB.php";
if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
    $db= new DB();
    $select = "select * from playlist where id_account ='$user'";
    $result=$db->conn->query($select);
    $json= json_encode($result->fetch_all(),JSON_UNESCAPED_UNICODE);
    echo $json ;
    }
?>