<div class="contains-manager"> 
<?php
     for($i=0;$i<count($data);$i++){
                $createView= new controller();
              echo  $createView->createItemAdmin($data[$i]['nameSong'], $data[$i]['ID_Song'],$data[$i]["ID_Poster"],$data[$i]['id_account'],$data[$i]['datePost']);
       }
    ?>
</div>