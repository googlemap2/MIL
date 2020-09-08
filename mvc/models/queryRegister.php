<?php
class queryRegister extends DB{
    public function registerUser($username,$password,$email){
        //filter special char in input
        $username=mysqli_real_escape_string($this->conn,$username);
        $password=mysqli_real_escape_string($this->conn, $password);
        $email= mysqli_real_escape_string($this->conn,$email);

        $password=password_hash($password, PASSWORD_DEFAULT);
        $insertUsername = $this->insertAccount($username,$password,date("Y/m/d"),$email); 
        if(mysqli_query($this->conn,$insertUsername)){
            return true;
        }
        else{
            return false;
        }
    }
}
?>