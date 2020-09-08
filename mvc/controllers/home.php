<?php
    class home extends controller{
        public $usemodelAdmin;
        public $usemodel;
        
        public function __construct()
        {
            $this->usemodelAdmin= $this->model("queryAdmin");
            $this->usemodel=$this->model("song");
        }
    
        public  function del(){
            if(isset($_SESSION['user'])&&$_SESSION['user']=="admin"){
                 if(isset($_POST['id_song']) && isset($_POST['username'])&& isset($_POST['id_poster']) ){
                     $id_song=$_POST['id_song'];
                     $username=$_POST['username'];
                     $poster=$_POST['id_poster'];
                     if($username=="admin"){
                        $list=$this->usemodelAdmin->getInfo($id_song);
                        $arr=  explode( ')',$list[0]['ID_Song']);
                        $mp3=$arr[0];
                       
                        if($this->usemodelAdmin->delSong($id_song)){
                        unlink("./mp3/".$mp3.".mp3");
                        unlink("./poster/".$poster.".png");
                        $this->excuteScript("alert('Xóa thành công')");
                     }
                   
                   }
                  }
            }
            $this->manager();
        }

        public function manager(){
            if(isset($_SESSION['user'])){
                $list= $this->usemodelAdmin->loadListUser();
                if(empty($list)){
                    $this->view("default");
                }
                else{
                    $this->view("default",$list);
                }
            }
            else{
                $this->view("default");
            }
        }

        public function  admin(){
            $_SESSION['admin']=true;
            $this->manager();
        }

        public function default(){
            unset($_SESSION['admin']);
            $list= $this->usemodel->getSong();
            $this->view("default",$list);
        }
    } 
?>