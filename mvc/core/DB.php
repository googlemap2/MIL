<?php
    class DB{
        public $conn;
        protected $serverName="localhost";
        protected $userName="root";
        protected $password="";
        protected $dbName="db_mil";
        function __construct()
        {
            $this->conn=mysqli_connect($this->serverName,$this->userName,$this->password,$this->dbName);
            mysqli_query($this->conn,"SET NAMEs 'utf8'");
        }

        public function insertAccount($id_account,$password,$dateRegister,$email)
        {
            return "insert into account(id_account,password,dateRegister,email) values ('$id_account','$password','$dateRegister','$email') ";
        }

        
    }
