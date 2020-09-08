<?php
require_once "DB.php";
if(isset($_GET["category"])){
    $value = $_GET["category"];
    $db= new DB();
    $list=[];
    $result= $db->conn->query("select Category from categories");

    $json= json_encode($result->fetch_all(),JSON_UNESCAPED_UNICODE);
    echo $json ;
}
?>