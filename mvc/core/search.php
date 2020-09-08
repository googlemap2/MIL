<?php
require_once "DB.php";
if(isset($_GET["search"])){
    $value = $_GET["search"];
    $db= new DB();
$list=[];
    $result= $db->conn->query("select nameSong,ID_Song from song WHERE id_account='admin' and nameSong LIKE CONCAT('%','$value','%')");
        array_push($list,$result->fetch_all());

    $singer= $db->conn->query("select  DISTINCT  singer FROM song WHERE singer LIKE '%$value%'");
        array_push($list,$singer->fetch_all());
    $json= json_encode($list,JSON_UNESCAPED_UNICODE);
    echo $json ;
}
?>