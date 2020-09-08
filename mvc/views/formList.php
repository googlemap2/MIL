<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Play List</title>
    <link href='/MIL/css/main.css' rel='stylesheet'/>
</head>

<body>
<div class="wrapper">
<?php
        include_once "./mvc/views/viewmaster/header.php";
     ?> 
<div class="innerwrap">
        <div class="title">
            <a href="/MIL/playlist">Play List</a>
        </div>
        <div class="wrapPlaylist" >
        <input type="text" name="insertList" id="namePLaylist" placeholder="Insert Playlist">
        <button class="wrapButton" id="addList">Add</button>
        </div>

        <div class="wrapPlaylist" class="wrapName">
       <select name="selectPlaylist" id="selectPlaylist" class="wrapSelect">
           <?php
              for ($i=0;$i<count($data[0]);$i++){
                $namePlaylist= $data[0][$i]['namePlaylist'];
                $id_playlist=$data[0][$i]['id_playlist'];
                echo "<option value='$id_playlist'>$namePlaylist</option>";
            };
           ?>
       </select>
       <input type="text" id="updateNamePlaylist" class="wrapName" placeholder="Update Name Playlist ">
        <button class="wrapButton" id="btn_updatePlaylist">Sửa</button>
        </div>

        <div class="wrapPlaylist">
       <select name="selectPlaylist" id="selectDelete" class="wrapSelect">
           <?php
              for ($i=0;$i<count($data[0]);$i++){
                $namePlaylist= $data[0][$i]['namePlaylist'];
                $id_playlist=$data[0][$i]['id_playlist'];
                echo "<option value='$id_playlist'>$namePlaylist</option>";
            };
           ?>
       </select>
        <button class="wrapButton" id="btn_delete">Xóa</button>
        </div>

        <div class="contains-music-list">
            <div class="myPlaylist">
            <div class="title">
                   My Playlist
               </div>
            <?php
            if(isset($data[0]))
            {
                for ($i=0;$i<count($data[0]);$i++){
                    $namePlaylist= $data[0][$i]['namePlaylist'];
                    $id_playlist=$data[0][$i]['id_playlist'];
                    echo "<a href='/MIL/playlistsong/playlistUser/$id_playlist' class='item-song item-playlist'>$namePlaylist</a>";
                };
            }
               
            ?>
            </div>
           <div>
               <div  class="title">
                   My music
               </div>
           <?php
             if (isset($data[1])){
                for ($i=0;$i<count($data[1]);$i++){
                    $poster= $data[1][$i]['ID_Poster'];
                    $song= $data[1][$i]['nameSong'];
                    $singer= $data[1][$i]['singer'];
                    echo "<a href='/MIL/player' class='item-song'><img src='/MIL/poster/$poster.png'><p>$song</p><p>$singer</p></a>";
                };
             }
               
            ?>
           </div>
           

        </div>
     </div>
</div>
   
</body>

</html>
