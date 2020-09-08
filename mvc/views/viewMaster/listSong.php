<div class="title">
         <a href="#">Offer</a>
</div>
<div class="contains-music">
        <?php
         $createView= new controller();
         if (isset($data)){
            for($i=0;$i<count($data);$i++){
                echo  $createView->createItemSong($data[$i]['ID_Song'],$data[$i]['nameSong'],$data[$i]['ID_Poster'],$data[$i]['singer']);
             }
         }
       
          ?>
          
</div>
 <!-- <div class="title">
            <a href="#">Offer</a>
</div> -->
<?php
if (isset($_SESSION['user'])){
    echo "<script src='/MIL/js/insertplaylist.js'></script>";
}

?>