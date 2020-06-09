<?php
    class song extends DB{
        public function getSong(){
            //get db
            $sql= "select nameSong from song";
             return mysqli_query($this->conn,$sql);
        }
    }
?>