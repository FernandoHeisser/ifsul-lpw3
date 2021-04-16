<?php
    class DatabaseConnection{
        private $host = "localhost";
        private $dbName = "carpool";
        private $username = "fernando";
        private $password = "123";
        public $conn;
    
        public function getConnection(){
            $this->conn = null;
    
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbName, $this->username, $this->password);
                $this->conn->exec("set names utf8");
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                return $this->conn;
            } catch(PDOException $exception){
                echo "Connection error: " . $exception->getMessage();
            }
        }
    }
?>
