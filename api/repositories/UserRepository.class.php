<?php
    include_once("database/connection/connection.php");

    class UserRepository {
        private $conn;
        private $tableName = "users";

        public function __construct(){
            $database = new DatabaseConnection();
            
            $this->conn = $database->getConnection();
        }

        public function create(User $user){
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
                {$user->getEmail()},
                {$user->getName()},
                {$user->getCpf()},
                {$user->getPassword()},
                {$user->getPhone()},
                {$user->getCity()},
                {$user->getNeighborhood()},
                {$user->getStreet()},
                {$user->getFacebook()},
                {$user->getInstagram()},
                {$user->getTwitter()})";
    
            $stmt = $this->conn->prepare($query);
    
            $stmt->execute();
    
            return $stmt;
        }
        
        public function getUsers(){
            $query = "SELECT * FROM {$this->tableName}";

            $statement = $this->conn->prepare($query);
            $statement->execute();

            $results = $statement->fetchAll(PDO::FETCH_ASSOC);

            return json_encode($results);
        }
    }
?>