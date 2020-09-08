<?php
class queryAdmin extends DBAdmin{
    public function loadListUser(){
        $sqlLoadList="select * from song,poster where poster.ID_Song=song.ID_Song";
        $result = mysqli_query($this->conn,$sqlLoadList);
        $list=[];
        if(mysqli_num_rows($result)>0){
             while($row=$result->fetch_assoc()){
                 $list[]=$row;
             }
        }
        return $list;
    }

    public function delSong($id_song){
        $sqlDelRowInfoplaylist="delete from `infoplaylist` WHERE ID_Song='$id_song'";
        $sqlDelRowPoster="delete from `poster` WHERE ID_Song='$id_song'";
        $sqlDelRowSong="delete from `song` WHERE ID_Song='$id_song'";
        if(mysqli_query($this->conn,$sqlDelRowInfoplaylist) && mysqli_query($this->conn,$sqlDelRowPoster) &&mysqli_query($this->conn,$sqlDelRowSong) ){
            return true;
        }
        return false;
    }



    public function getInfo($id_song){
        $sqlGetInfo="select * from `poster` where ID_Song='$id_song'";
        $result= mysqli_query($this->conn,$sqlGetInfo);
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