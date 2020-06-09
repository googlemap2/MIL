<?php
class queryRegister extends DB{
    public function registerUser($username,$password,$email){
        //filter special char in input
        $username=mysqli_real_escape_string($this->conn,$username);
        $password=mysqli_real_escape_string($this->conn, $password);
        $email= mysqli_real_escape_string($this->conn,$email);

        $password=password_hash($password, PASSWORD_DEFAULT);
        $insertUsername = $this->insertAccount($username,date("Y/m/d")); 
        $insertPassword= $this->insertPassword($username,$password);
        $insertEmail= $this->insertEmail($username,$email);
        if(mysqli_query($this->conn,$insertUsername) && mysqli_query($this->conn,$insertPassword) && mysqli_query($this->conn,$insertEmail)){
            return true;
        }
        else{
            return false;
        }
    }
}
?>