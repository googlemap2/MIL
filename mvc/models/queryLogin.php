<?php
class queryLogin extends DB{
    public function checkLogin($username){
        $sql = "select * from account,passworduser where account.id_account=passworduser.id_account and account.id_account='$username'";
        $result=mysqli_query($this->conn,$sql);
       return $user=$result->fetch_assoc() ;
    }
}
?>