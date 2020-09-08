<?php
class playlist extends controller{
    public $usemodel;
    public function __construct()
    {
        $this->usemodel= $this->model("queryList");;
    }
    function excuteList(){
        if(isset($_SESSION['user'])){
            $listPLaylist= $this->usemodel->loadListUser($_SESSION['user']);
            $listSong=$this->usemodel->loadSongUser($_SESSION['user']);
            $list=[$listPLaylist,$listSong];
            if(empty($list)){
                $this->view("formList");
            }
            else{
                $this->view("formList",$list);
            }
          
        }
        else{
            $this->view("formList");
        }
        
    }
}
