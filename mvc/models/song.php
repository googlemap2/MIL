<?php
    class song extends DB{
        public function getSong(){
            //get db
            $sql= "select * from song,poster where song.ID_Song=poster.ID_Song and license = 1";
            $list=[];
            $results= mysqli_query($this->conn,$sql);
            while($row=$results->fetch_assoc()){
                $list[]=$row;
            }
            return $list;
        }

        public function getSongSinger($singer){
            //get db
            $sql= "select * from song,poster where poster.ID_Song=song.ID_Song and  license =1 and singer LIKE CONCAT('%','$singer','%')";
            $list=[];
            $results= mysqli_query($this->conn,$sql);
            while($row=$results->fetch_assoc()){
                $list[]=$row;
            }
            return $list;
        }

        public function getSongOfCategory($category){
            $sql ="SELECT * FROM categories,song,poster WHERE song.ID_Song=poster.ID_Song and song.ID_Categories=categories.ID_Categories  and song.license=1 and Category like concat('%','$category','%')";
            $results= mysqli_query($this->conn,$sql);
            $list=[];
            while($row=$results->fetch_assoc()){
                $list[]=$row;
            }
            return $list;
        }

        public function getSongOfPlaylist($user,$playlist){
            $sql ="SELECT * FROM `infoplaylist`,playlist, song ,poster where playlist.id_playlist=infoplaylist.id_playlist and song.ID_Song=infoplaylist.ID_Song and poster.ID_Song =song.ID_Song and playlist.id_account='$user' and infoplaylist.id_playlist='$playlist'";
            $results= mysqli_query($this->conn,$sql);
            $list=[];
            while($row=$results->fetch_assoc()){
                $list[]=$row;
            }
            return $list;
        }
    }
?>