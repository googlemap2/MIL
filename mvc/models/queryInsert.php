<?php
    class queryInsert extends DB{
        function createSong($idsong,$song,$view =0,$poster){
           $song= mysqli_real_escape_string($this->conn,$song);
            $sqlCreateSong="insert into song values ('$idsong','$song','$view')";
            $sqlCreatePoster = "insert into poster values ('$idsong','$poster')";
            if(mysqli_query($this->conn,$sqlCreateSong) && mysqli_query($this->conn,$sqlCreatePoster)){
                return true;
            }
            else{
                return false;
            }
        }
    }
?>