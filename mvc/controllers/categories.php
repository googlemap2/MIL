<?php
class categories extends controller{
    public $usermodel=null;
    function __construct()
    {
     $this->usermodel=$this->model("song");
    }

    public function Categoires()
    {
        
    }

    public function listCategory($Category)
    {
        $list= $this->usermodel->getSongOfCategory($Category);
            $this->view("default",$list);
            
    }
}
?>