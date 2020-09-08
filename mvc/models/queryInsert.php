<?php
    class queryInsert extends DB{
        function createSong($user,$idsong,$song,$view,$poster,$date,$license,$categories,$singer){
            $sqlCreateSong="insert into song (`ID_Song`, `ID_Categories`, `id_account`, `nameSong`, `viewSong`, `datePost`, `license`, `singer`) values  ('$idsong','$categories','$user','$song',$view,'$date',$license,'$singer')";
            $sqlCreatePoster = "insert into poster values ('$poster','$idsong')";
            if(mysqli_query($this->conn,$sqlCreateSong) && mysqli_query($this->conn,$sqlCreatePoster) ){
                return true;
            }
            else{
                return false;
            }
        }
    }
?>