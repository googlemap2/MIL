<?php
session_start();

require_once "./mvc/bridge.php"; 
echo "<link href='/MIL/css/main.css' rel='stylesheet'/>";    
$myApp= new App();
echo "<script src='./js/main.js'></script>";    

?>