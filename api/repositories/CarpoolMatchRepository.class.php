<?php
    class CarpoolMatchRepository {
        private $conn;
        private $tableName = "carpool_match";

        public function __construct(){
            $database = new DatabaseConnection();
            
            $this->conn = $database->getConnection();
        }

        public function getCarpoolMatchsById($id){
            $query = "SELECT
                id,
                carpool_request_id,
                carpool_offer_id,
                accepted
                FROM {$this->tableName} WHERE id = {$id} LIMIT 1";

            $statement = $this->conn->prepare($query);
            $statement->execute();

            $results = $statement->fetch(PDO::FETCH_ASSOC);

            return json_encode($results);
        }

        public function getCarpoolMatchsByCarpoolRequestId($carpoolRequestId){
            $query = "SELECT
                id,
                carpool_request_id,
                carpool_offer_id,
                accepted
                FROM {$this->tableName} WHERE carpool_request_id = {$carpoolRequestId}";

            $statement = $this->conn->prepare($query);
            $statement->execute();

            $results = $statement->fetchAll(PDO::FETCH_ASSOC);

            return json_encode($results);
        }

        public function getCarpoolMatchsByCarpoolOfferId($carpoolOfferId){
            $query = "SELECT
                id,
                carpool_request_id,
                carpool_offer_id,
                accepted
                FROM {$this->tableName} WHERE carpool_offer_id = {$carpoolOfferId}";

            $statement = $this->conn->prepare($query);
            $statement->execute();

            $results = $statement->fetchAll(PDO::FETCH_ASSOC);

            return json_encode($results);
        }
    }
?>