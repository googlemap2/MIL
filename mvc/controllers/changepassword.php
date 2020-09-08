<?php
    class changepassword extends controller{
        protected $usemodel;
        function __construct()
        {
            $this->usemodel=$this->model("queryChangePass");
            
        }

        function excuteChange(){
            if(isset($_SESSION["user"])){
                $this->view("formChangePass",["user"=>$_SESSION["user"]]);
                if(isset($_POST["oldPassword"])&& isset($_POST["changePassword"])){
                    $getpass=  $this->model("queryLogin");
                    $result =$getpass->checkLogin($_SESSION["user"]);
                  if (password_verify($_POST["oldPassword"],$result["password"])){
                    if($this->usemodel->changePass($_SESSION["user"], $_POST["changePassword"])){
                        $_SESSION["user"]=null;
                        $this->_header("login");
                    }
                    else{
                        $this->view("formChangePass",[  "error"=>"Đổi mật khẩu không thành công "]);
                    }
                   
                  }
                }
                
            }
            else{
                $this->view("formChangePass",
                [
                    "user"=>"this user",
                    "error"=>"Bạn cần đăng nhập."
                ]);
            }
           
        }
    }
?>