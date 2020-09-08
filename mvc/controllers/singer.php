<?php
class singer extends controller{
    public $usermodel=null;
    function __construct()
    {
     $this->usermodel=$this->model("song");
    }

    public function Singer(){

    }

    public function listSinger($singername)
    {
        $singer=$singername;
        $list= $this->usermodel->getSongSinger($singer);
            $this->view("default",$list);

    }
}
?>