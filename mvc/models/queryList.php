<?php
    class queryList extends DB{
       public function loadListUser($user){
            $sqlLoadList="SELECT * FROM `playlist` where  id_account='$user'";
            $result = mysqli_query($this->conn,$sqlLoadList);

            $list=[];
            if(mysqli_num_rows($result)>0){
                 while($row=$result->fetch_assoc()){
                     $list[]=$row;
                 }
            }
            return $list;
        }

        public function loadSongUser($user)
        {
            $sqlLoadList="SELECT * FROM `song`,poster WHERE poster.ID_Song=song.ID_Song  and  id_account='$user'";
            $result = mysqli_query($this->conn,$sqlLoadList);

            $list=[];
            if(mysqli_num_rows($result)>0){
                 while($row=$result->fetch_assoc()){
                     $list[]=$row;
                 }
            }
            return $list;
        }
    }
?>