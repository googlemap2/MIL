<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link href='/MIL/css/main.css' rel='stylesheet'/>
</head>

<body>
    <div class="wrapper" id="wrapper">
         <?php
        include_once "./mvc/views/viewmaster/header.php";
     ?> 
 <div class="innerwrap">
    <div class="contain_controler">
    <div class="name_song">
    <img id="img">
        <h2 id="song"></h2>
        <h2 id="singer"></h2>
    </div>
    <div class="timing">
    <input type="range" value="0" step="any" id="time" class="time" name="time"/>
                    <label for="time" id="loadTime">00:00:00</label>
    </div>
    <div class="controller">
        <i id="prev"  class="fas fa-fast-backward"></i>
        <i id="play" class="fas fa-play"></i>
        <i id="pause" class="fas fa-pause" ></i>
        <i id="next" class="fas fa-fast-forward"></i>
        <i id="auto-next" class="fas fa-random" ></i>
        <i id="loop" class="fas fa-undo"></i>
    </div>
    </div>
     </div>
    </div>
   
</body>

</html>