<?php
    class insert extends controller{

        public $errorUpload = "";
        protected $usemodel;

        function __construct()
        {
            $this->usemodel= $this->model("queryInsert");
        }

        function excuteInsert(){
            if(isset($_POST['submitInsert'])){
                if (isset($_POST['nameSong'])  && is_uploaded_file($_FILES['posterSong']['tmp_name']) && is_uploaded_file($_FILES['song']['tmp_name'])) {
                    if($_FILES['posterSong']['error']>0 || $_FILES['song']['error']>0 || !$this->checkTypeFileIMG($_FILES['posterSong']['name'])||!$this->checkTypeFileMP3($_FILES['song']['name'])|| file_exists($this->pathSong(). $_FILES['song']['name'])){
                         $this->errorUpload="Kiểm tra lại định dạng file";
                        $this->view("formInsert",["error"=>  $this->errorUpload]);
                    }
                    elseif(!$this->checkEmpty($_POST['nameSong']) ){
                        $this->errorUpload="Không được để trống thông tin";
                        $this->view("formInsert",["error"=>  $this->errorUpload]);
                    }
                    else{
                        $song = htmlspecialchars($_POST['nameSong']);
                        $idsong= uniqid($song);
                        $poster=uniqid();
                        $result =$this->usemodel->createSong($idsong,$song,0,$poster);
                        if($result){
                            move_uploaded_file($_FILES['song']['tmp_name'], $this->pathSong() .$song.".mp3");
                            $this->errorUpload="Tạo bài hát thành công";
                            $this->view("formInsert",["error"=>  $this->errorUpload]);
                        }
                    }
                }
            }
           else{
               $this->view("formInsert");
           }
        }
    }
?>