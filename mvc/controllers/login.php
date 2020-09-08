<?php
    class login extends controller{
        public $usermodel;
        public function __construct()
        {
            $this->usermodel=$this->model("queryLogin");
        }

        public function excuteLogin(){
            if(isset($_POST['submit'])){
                if(isset($_POST['username']) && isset($_POST['password'])){
                    $username=htmlspecialchars( $_POST['username']);
                    $result=$this->usermodel->checkLogin($username); 
                    if ($result != null){
                        if(password_verify($_POST['password'],$result['password'])){
                                    $_SESSION['user']=$result['id_account'];
                                    $this->_header("home");                       
                        }
                        else{
                            $this->view("formLogin");
                        }
                    }
                    else{
                        $this->view("formLogin",["error"=>"Sai tên tài khoản hoặc mật khẩu"]
                    );
                    }
               
                }
            }
            else{
                $this->view("formLogin");
            }
        }

        public function logout(){
            unset( $_SESSION['user']);
             $this->_header("home");
        }

    }
?>