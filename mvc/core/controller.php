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
    }
