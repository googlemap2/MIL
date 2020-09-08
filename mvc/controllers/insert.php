<?php
    class insert extends controller{

        public $errorUpload = "";
        protected $usemodel;

        function __construct()
        {
            $this->usemodel= $this->model("queryInsert");
        }

        function excuteInsert(){
            if(isset($_SESSION['user'])){
                if(isset($_POST['submitInsert'])){
                    if (isset($_POST['nameSong'])&&isset($_POST["singer"])&& isset($_POST["categories"]) && is_uploaded_file($_FILES['posterSong']['tmp_name']) && is_uploaded_file($_FILES['song']['tmp_name'])) {
                        if($_FILES['posterSong']['error']>0 || $_FILES['song']['error']>0 || !$this->checkTypeFileIMG($_FILES['posterSong']['name'])||!$this->checkTypeFileMP3($_FILES['song']['name'])|| file_exists($this->pathSong(). $_POST['nameSong'].".mp3")){
                             $this->errorUpload="Kiểm tra lại định dạng file hoặc tên bài hát đã tồn tại";
                            $this->view("formInsert",["error"=>  $this->errorUpload]);
                        }
                        elseif(!$this->checkEmpty($_POST['nameSong']) ){
                            $this->errorUpload="Không được để trống thông tin";
                            $this->view("formInsert",["error"=>  $this->errorUpload]);
                        }
                        else{
                            $song = htmlspecialchars($_POST['nameSong']);
                            $idsong= uniqid($song.")");
                            $poster=uniqid($song);
                            $user=$_SESSION['user'];
                            $singer=$_POST["singer"];
                            $category=$_POST["categories"];
                            if($user == "admin"){
                                $result =$this->usemodel->createSong($user,$idsong,$song,0,$poster,date("Y/m/d"),1,$category,$singer);
                            }
                            else{
                                $result =$this->usemodel->createSong($user,$idsong,$song,0,$poster,date("Y/m/d"),0,$category,$singer);
                            }
                            if($result){
                                move_uploaded_file($_FILES['song']['tmp_name'], $this->pathSong() .$song.".mp3");
                                move_uploaded_file($_FILES['posterSong']['tmp_name'], $this->pathPoster() .$poster.".png");
                                $this->errorUpload="Tạo bài hát thành công";
                                $this->view("formInsert",["error"=>  $this->errorUpload]);
                            }
                            else{
                                $this->view("formInsert",["error"=>  $this->errorUpload]);
                            }
                        }
                    }
                }
               else{
                 $this->view("formInsert");
               }
            }else{
                $this->view("login");
            }
            
        }
    }
?>