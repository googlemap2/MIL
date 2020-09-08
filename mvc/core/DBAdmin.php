<?php
    class DBAdmin{
        public $conn;
        protected $serverName="localhost";
        protected $userName="root";
        protected $password="";
        protected $dbName="db_mil";
        function __construct()
        {
            $this->conn=mysqli_connect($this->serverName,$this->userName,$this->password,$this->dbName);
            mysqli_select_db($this->conn,$this->dbName);
            mysqli_query($this->conn,"SET NAMEs 'utf8'");
        }

        public function insertAccount($id_account,$dateRegister)
        {
            return "insert into account(id_account,dateRegister) values ('$id_account','$dateRegister') ";
        }

        public function insertPassword($id_account,$password)
        {
            return "insert into passworduser values ('$id_account','$password')";
        }

        public function insertEmail($id_account,$email)
        {
            return "insert into email values ('$id_account','$email')";
        }
    }
