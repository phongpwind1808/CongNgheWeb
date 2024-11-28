<?php

require_once './config.php';
    class dbConnection{
        private $host;
        private $user;
        private $pass;
        private $dbname;
        private $conn;

        public function __construct()
        {
            $this->host = host;
            $this->user = user;
            $this->pass = pwd;
            $this->dbname = db_name;

            try{
                $sqlStr = "mysql:host=$this->host;dbname=$this->dbname";

                $this->conn = new PDO($sqlStr, $this->user, $this->pass);
            }catch(PDOException $e){
                $this->conn = null;
            }
        }

        public function getConn(){
            return $this->conn;
        }
    }
?>