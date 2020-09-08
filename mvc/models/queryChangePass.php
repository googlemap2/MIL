<?php
class queryChangePass extends DB{
    function changePass($user,$password){
        $user= mysqli_real_escape_string($this->conn,$user);
        $password= mysqli_real_escape_string($this->conn,$password);
        $password=password_hash($password,PASSWORD_DEFAULT);
        $sqlChangePass="update account set password='$password' where id_account='$user'";
        if(mysqli_query($this->conn,$sqlChangePass)){
            return true;
        }
        return false;
    }
}
?>