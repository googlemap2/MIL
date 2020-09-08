<?php
class playlistsong extends controller{
    public $usemodel;
    public  function __construct()
    {
        $this->usemodel= $this->model("song");;
    }

    public  function playlistUser($playlist){
        if(isset($_SESSION["user"])){
            $list=$this->usemodel->getSongOfPlaylist($_SESSION["user"],$playlist);
            $this->view("default",$list);
            print_r($list);
        }
      
    }
}
?>