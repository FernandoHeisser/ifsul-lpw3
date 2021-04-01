<?php
    class DatabaseConnection{
        private $host = "localhost";
        private $db_name = "LPW3";
        private $username = "fernando";
        private $password = "123";
        public $conn;
    
        public function getConnection(){
            $this->conn = null;
    
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
                $this->conn->exec("set names utf8");

            } catch(PDOException $exception){
                echo "Connection error: " . $exception->getMessage();
            }
    
            return $this->conn;
        }
    }
?>