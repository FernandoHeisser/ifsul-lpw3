<?php
    class CarpoolMatchRepository {
        private $conn;
        private $tableName = "carpool_match";

        public function __construct() {
            $database = new DatabaseConnection();
            
            $this->conn = $database->getConnection();
        }

        public function createCarpoolMatch(CarpoolMatch $carpoolMatch) {
            try { 
                $query = "INSERT INTO {$this->tableName} (
                    carpool_request_id,
                    carpool_offer_id,
                    accepted)
                    VALUES ( 
                    {$carpoolMatch->getCarpoolRequestId()},
                    {$carpoolMatch->getCarpoolOfferId()},
                    0)";

                $stmt = $this->conn->prepare($query);

                $stmt->execute();

                return $this->conn->lastInsertId();

            } catch (Exception $e) {
                echo "Exception: {$e->getMessage()}";
            }
        }

        public function getCarpoolMatchById($id) {
            try {
                $query = "SELECT * FROM {$this->tableName} WHERE id = {$id} LIMIT 1";

                $statement = $this->conn->prepare($query);
                $statement->execute();

                $carpoolMatch = $statement->fetch(PDO::FETCH_ASSOC);

                return json_encode($carpoolMatch);

            } catch(Exception $e) {
                echo "Exception: {$e->getMessage()}";
            }
        }

        public function getCarpoolMatchsByCarpoolRequestId($carpoolRequestId) {
            try {
                $query = "SELECT * FROM {$this->tableName} WHERE carpool_request_id = {$carpoolRequestId}";

                $statement = $this->conn->prepare($query);
                $statement->execute();

                $carpoolMatchs = $statement->fetchAll(PDO::FETCH_ASSOC);

                return json_encode($carpoolMatchs);

            } catch(Exception $e) {
                echo "Exception: {$e->getMessage()}";
            }
        }

        public function getCarpoolMatchsByCarpoolOfferId($carpoolOfferId) {
            try {
                $query = "SELECT * FROM {$this->tableName} WHERE carpool_offer_id = {$carpoolOfferId}";

                $statement = $this->conn->prepare($query);
                $statement->execute();

                $carpoolMatchs = $statement->fetchAll(PDO::FETCH_ASSOC);

                return json_encode($carpoolMatchs);

            } catch(Exception $e) {
                echo "Exception: {$e->getMessage()}";
            }
        }

        public function getCarpoolMatchsByCarpoolOfferIdAndCarpoolRequestId($carpoolOfferId, $carpoolRequestId) {
            try {
                $query = "SELECT * FROM {$this->tableName} WHERE carpool_offer_id = {$carpoolOfferId} AND carpool_request_id = {$carpoolRequestId}";

                $statement = $this->conn->prepare($query);
                $statement->execute();

                $carpoolMatchs = $statement->fetchAll(PDO::FETCH_ASSOC);

                return json_encode($carpoolMatchs);

            } catch(Exception $e) {
                echo "Exception: {$e->getMessage()}";
            }
        }
    }
?>