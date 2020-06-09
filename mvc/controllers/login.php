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
                    if(password_verify(htmlspecialchars($_POST['password']),$result['passwordUser'])){
                        if($result){
                            echo $_SESSION['user']=$result['id_account'];
                            header('location:http://localhost/MIL/home') ;
                        }
                    }
                    else{
                        $this->view("formLogin");
                    }
                }
            }
            else{
                $this->view("formLogin");
            }
        }

        public function logout(){
            unset( $_SESSION['user']);
            header('location:http://localhost/MIL/home') ;
        }

    }
?>