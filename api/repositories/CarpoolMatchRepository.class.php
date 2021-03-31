<?php
    class CarpoolMatchRepository {
        private $conn;
        private $tableName = "carpool_match";

        public function __construct(){
            $database = new DatabaseConnection();
            
            $this->conn = $database->getConnection();
        }

        public function getCarpoolMatchsById($id){
            try {
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

            } catch(Exception $e) {
                echo "Exception: {$e->getMessage()}";
            }
        }

        public function getCarpoolMatchsByCarpoolRequestId($carpoolRequestId){
            try {
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

            } catch(Exception $e) {
                echo "Exception: {$e->getMessage()}";
            }
        }

        public function getCarpoolMatchsByCarpoolOfferId($carpoolOfferId){
            try {
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

            } catch(Exception $e) {
                echo "Exception: {$e->getMessage()}";
            }
        }
    }
?>