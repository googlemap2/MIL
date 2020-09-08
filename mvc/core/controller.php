<?php
    class controller {
        public $typeFileIMG = array('gif', 'png', 'jpg');
        public $typeFileMP3=array('flac','m4a','mp3','webm');

        public function model($model){
            require_once "./mvc/models/".$model.".php";
            return new $model;
        }

        public function view($view,$data=[ ]){
            require_once "./mvc/views/".$view.".php";
        }

        public function viewMaster($view,$data=[ ]){
            require_once "./mvc/views/viewMaster/".$view.".php";
        }
        
        function excuteScript($script){
            return "<script>.$script.</script>";
        }

        public function checkEmpty($string){
            if(str_replace(' ','',$string)!=''){
                return true;
            }
            return false;
        }

        public function checkEmptyRegister($username,$password,$repass,$emai){
            if($this->checkEmpty($username) &&  $this->checkEmpty($password) && $this->checkEmpty($repass) && $this->checkEmpty($emai)){
                return true;
            }
            return false;
        }

        function pathSong(){
            return realpath($_SERVER["DOCUMENT_ROOT"]) . "/MIL/mp3/";
        }

        function pathPoster(){
            return realpath($_SERVER["DOCUMENT_ROOT"]) . "/MIL/poster/";
        }

    function checkTypeFileIMG($filename)
    {
        $ext= pathinfo($filename,PATHINFO_EXTENSION);
        if(in_array($ext,$this->typeFileIMG)){
            return true;
        }
        return false;
    }

    function checkTypeFileMP3($filename)
    {
        $ext= pathinfo($filename,PATHINFO_EXTENSION);
        if(in_array($ext,$this->typeFileMP3)){
            return true;
        }
        return false;
    }

    function createItemSong($id,$namesong,$poster,$singer){
        $poster="/MIL/poster/".$poster.".png";
        return   "  <div class='wrap_item'>
        <input type='hidden' value='$id'>
        <a href='/MIL/player' class='item'><img src='$poster' class='poster'>
        <p class='song'>$namesong</p>
        <p class='singer'>$singer</p></a>
        <div class='button'>Insert For Playlist
        <div class='item-list'>
        </div>
        </div>
        </div> ";
    }

    function createItemAdmin($namesong,$id_song,$id_poster,$id_user,$datepost){
        return "<form action='/MIL/home/del' method='post' class='table'>
        <p>$namesong</p>
        <p>$id_user</p>
        <p>$datepost</p>
        <input type='hidden' name='id_song' value='$id_song'>
        <input type='hidden' name='id_poster' value='$id_poster'>
        <input type='hidden' name='username' value='$id_user'>
        <input type='submit' value='Delete' name='del'>
    </form>";
        
    }
    public function _header($string){
        $host  = $_SERVER['HTTP_HOST'];
            $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            header("Location: http://$host$uri/".$string);
    }
}
