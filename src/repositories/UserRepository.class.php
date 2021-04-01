<?php
    include_once("database/connection/connection.php");

    class UserRepository {
        private $conn;
        private $tableName = "users";

        public function __construct(){
            $database = new DatabaseConnection();
            
            $this->conn = $database->getConnection();
        }

        public function createUser(User $user){
            try {
                $city = !empty($user->getCity())? "'{$user->getCity()}'" : "NULL";
                $neighborhood = !empty($user->getNeighborhood())? "'{$user->getNeighborhood()}'"  : "NULL";
                $street = !empty($user->getStreet())? "'{$user->getStreet()}'"  : "NULL";
                $facebook = !empty($user->getFacebook())? "'{$user->getFacebook()}'"  : "NULL";
                $instagram = !empty($user->getInstagram())? "'{$user->getInstagram()}'"  : "NULL";
                $twitter = !empty($user->getTwitter())? "'{$user->getTwitter()}'"  : "NULL";
                
                $query = "INSERT INTO {$this->tableName} (
                    email,
                    name,
                    cpf,
                    password,
                    phone,
                    city,
                    neighborhood,
                    street,
                    facebook,
                    instagram,
                    twitter)
                    VALUES ( 
                    '{$user->getEmail()}',
                    '{$user->getName()}',
                    '{$user->getCpf()}',
                    '{$user->getPassword()}',
                    '{$user->getPhone()}',
                    {$city},
                    {$neighborhood},
                    {$street},
                    {$facebook},
                    {$instagram},
                    {$twitter})";


                $stmt = $this->conn->prepare($query);

                $stmt->execute();

                return $this->conn->lastInsertId();

            } catch (Exception $e) {
                echo "Exception: {$e->getMessage()}";
            }
        }
        
        public function getUsers(){
            try {
                $query = 
                    "SELECT 
                    id,
                    email,
                    name,
                    cpf,
                    password,
                    phone,
                    city,
                    neighborhood,
                    street,
                    facebook,
                    instagram,
                    twitter,
                    photo,
                    carpool_done,
                    carpool_canceled,
                    carpool_offered,
                    carpool_requested
                    FROM {$this->tableName}";

                $statement = $this->conn->prepare($query);
                $statement->execute();

                $results = $statement->fetchAll(PDO::FETCH_ASSOC);

                return json_encode($results);

            } catch (Exception $e) {
                echo "Exception: {$e->getMessage()}";
            }
        }

        public function getUserById($id){
            try {
                $query = "SELECT 
                    id,
                    email,
                    name,
                    cpf,
                    password,
                    phone,
                    city,
                    neighborhood,
                    street,
                    facebook,
                    instagram,
                    twitter,
                    photo,
                    carpool_done,
                    carpool_canceled,
                    carpool_offered,
                    carpool_requested
                    FROM {$this->tableName} WHERE id = {$id} LIMIT 1";

                $statement = $this->conn->prepare($query);
                $statement->execute();

                $result = $statement->fetch(PDO::FETCH_ASSOC);

                return json_encode($result);
                
            } catch (Exception $e) {
                echo "Exception: {$e->getMessage()}";
            }
        }
    }
?>