<?php
    class CarpoolRequestRepository {
        private $conn;
        private $tableName = "carpools_requested";

        public function __construct(){
            $database = new DatabaseConnection();
            
            $this->conn = $database->getConnection();
        }

        public function getCarpoolRequests(){
            $query = "SELECT
                id,
                user_id,
                phone,
                from_city,
                from_neighborhood,
                from_street,
                to_city,
                to_neighborhood,
                to_street,
                canceled,
                done
                FROM {$this->tableName}";

            $statement = $this->conn->prepare($query);
            $statement->execute();

            $results = $statement->fetchAll(PDO::FETCH_ASSOC);

            return json_encode($results);
        }

        public function getCarpoolRequestById($id){
            $query = "SELECT
                id,
                user_id,
                phone,
                from_city,
                from_neighborhood,
                from_street,
                to_city,
                to_neighborhood,
                to_street,
                canceled,
                done
                FROM {$this->tableName} WHERE id = {$id} LIMIT 1";

            $statement = $this->conn->prepare($query);
            $statement->execute();

            $results = $statement->fetch(PDO::FETCH_ASSOC);

            return json_encode($results);
        }

        public function getCarpoolRequestByUserId($userId){
            $query = "SELECT
                id,
                user_id,
                phone,
                from_city,
                from_neighborhood,
                from_street,
                to_city,
                to_neighborhood,
                to_street,
                canceled,
                done
                FROM {$this->tableName} WHERE user_id = {$userId} LIMIT 1";

            $statement = $this->conn->prepare($query);
            $statement->execute();

            $results = $statement->fetch(PDO::FETCH_ASSOC);

            return json_encode($results);
        }
    }
?>