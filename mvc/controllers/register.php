<?php
class register extends controller{

    protected $usemodel;
    protected $username="";
    protected $password="";
    protected $repass="";
    protected $email="";
    public  $errors = array( 'password' => '', 'repass' => '','email' => '');

    public function __construct()
    {
        $this->usemodel= $this->model("queryRegister");
    }

    
    public function excuteRegister(){
        if(isset($_POST['submitR'])){
            if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['repass']) && isset($_POST['email'])){
                $this->username=htmlspecialchars($_POST['username']);
                $this->password=htmlspecialchars($_POST['password']);
                $this->repass=htmlspecialchars($_POST['repass']);
                $this->email=htmlspecialchars($_POST['email']);

                $format = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:",]/';
            if (preg_match($format, $this->password)) {
                    $this->errors['password'] = "Không được chứa ký tự đặc biệt";
                } else {
                    $this->errors['password'] = "";
                }
                if ($this->password != $this->repass) {
                    $this->errors['repass'] = "Nhập đúng pass";
                } else {
                    $this->errors['repass'] = "";
                }
                if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                    $this->errors['email'] = "";
                } else {
                    $this->errors['email'] = "Nhập đúng định dạng email";
                }
                if (array_filter(  $this->errors)) {
                    $this->view("formRegister",$this->errors);
                }
                else{
                    if($this->usemodel->registerUser($this->username,$this->password,$this->email)){
                        header('location:http://localhost/MIL/login');
                    }
                    else{
                        $this->view("formRegister");
                    }
                  
                }
            }
        }
        else{
            $this->view("formRegister");
        }
    }
    
}
?>