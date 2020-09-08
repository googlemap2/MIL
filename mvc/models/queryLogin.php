<?php
class queryLogin extends DB{
    public function checkLogin($username){
        $sql = "select * from account where id_account='$username'";
        $result=mysqli_query($this->conn,$sql);
       return $result->fetch_assoc() ;
    }
}
?>