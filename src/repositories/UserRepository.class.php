<?php
    include_once("database/connection/connection.php");
    include_once("models/User.class.php");

    class UserRepository {
        private $conn;
        private $tableName = "users";

        public function __construct() {
            $database = new DatabaseConnection();
            
            $this->conn = $database->getConnection();
        }

        public function createUser($userArray) {
            try {
                $user = new User($userArray['email'], $userArray['name'], $userArray['password']);
                
                $query = "INSERT INTO {$this->tableName} (email, name, password)
                    VALUES ( 
                    '{$user->getEmail()}',
                    '{$user->getName()}',
                    '{$user->getPassword()}')";


                $stmt = $this->conn->prepare($query);

                $stmt->execute();

                return $this->conn->lastInsertId();

            } catch (Exception $e) {
                echo "Exception: {$e->getMessage()}";
            }
        }
        
        public function getUsers() {
            try {
                $query = 
                    "SELECT * FROM {$this->tableName}";

                $statement = $this->conn->prepare($query);
                $statement->execute();

                $users = $statement->fetchAll(PDO::FETCH_ASSOC);

                return json_encode($users);

            } catch (Exception $e) {
                echo "Exception: {$e->getMessage()}";
            }
        }

        public function getUserById($id) {
            try {
                $query = "SELECT * FROM {$this->tableName} WHERE id = {$id} LIMIT 1";

                $statement = $this->conn->prepare($query);
                $statement->execute();

                $user = $statement->fetch(PDO::FETCH_ASSOC);

                return json_encode($user);
                
            } catch (Exception $e) {
                echo "Exception: {$e->getMessage()}";
            }
        }

        public function login($email, $password) {
            try {
                $query = "SELECT * FROM {$this->tableName} WHERE email = '{$email}' AND password = '{$password}' LIMIT 1";

                $statement = $this->conn->prepare($query);
                $statement->execute();

                $user = $statement->fetch(PDO::FETCH_ASSOC);

                return json_encode($user);

            } catch (Exception $e) {
                echo "Exception: {$e->getMessage()}";
            }
        }
    }
?>