<?php
session_start();

require_once "./mvc/bridge.php"; 
$myApp= new App();
echo "<script src='/MIL/js/main.js'></script>";    
echo"<script src='/MIL/js/player.js'></script>";
echo"<script src='/MIL/js/playlist.js'></script>";
echo"<script src='/MIL/js/insertplaylist.js'></script>";
?>