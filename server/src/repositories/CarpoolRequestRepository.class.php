<?php
    include_once("database/connection/connection.php");
    include_once("models/CarpoolRequest.class.php");

    class CarpoolRequestRepository {
        private $conn;
        private $tableName = "carpools_requested";

        public function __construct() {
            $database = new DatabaseConnection();
            
            $this->conn = $database->getConnection();
        }

        public function createCarpoolRequest($carpoolRequestArray) {
            try {
                $carpoolRequest = new CarpoolRequest(
                    $carpoolRequestArray['user_id'], 
                    $carpoolRequestArray['phone'], 
                    $carpoolRequestArray['from_city'], 
                    $carpoolRequestArray['from_neighborhood'], 
                    $carpoolRequestArray['from_street'], 
                    $carpoolRequestArray['to_city'], 
                    $carpoolRequestArray['to_neighborhood'], 
                    $carpoolRequestArray['to_street'], 
                    $carpoolRequestArray['start_date'], 
                    $carpoolRequestArray['end_date']);

                $query = "INSERT INTO {$this->tableName} (user_id, phone, from_city, from_neighborhood, from_street, to_city, to_neighborhood, to_street, start_date, end_date, canceled)
                    VALUES ( 
                    {$carpoolRequest->getUserId()},
                    '{$carpoolRequest->getPhone()}',
                    '{$carpoolRequest->getFromCity()}',
                    '{$carpoolRequest->getFromNeighborhood()}',
                    '{$carpoolRequest->getFromStreet()}',
                    '{$carpoolRequest->getToCity()}',
                    '{$carpoolRequest->getToNeighborhood()}',
                    '{$carpoolRequest->getToStreet()}',
                    '{$carpoolRequest->getStartDate()}',
                    '{$carpoolRequest->getEndDate()}',
                    0)";

                $stmt = $this->conn->prepare($query);

                $stmt->execute();

                return $this->conn->lastInsertId();

            } catch (Exception $e) {
                echo "Exception: {$e->getMessage()}";
            }
        }

        public function getCarpoolRequests() {
            try {
                $query = "SELECT * FROM {$this->tableName} WHERE start_date > NOW() AND canceled = 0 ORDER BY start_date";

                $statement = $this->conn->prepare($query);
                $statement->execute();

                $carpoolRequests = $statement->fetchAll(PDO::FETCH_ASSOC);

                return json_encode($carpoolRequests);

            } catch(Exception $e) {
                echo "Exception: {$e->getMessage()}";
            }
        }

        public function getCarpoolRequestById($id) {
            try {
                $query = "SELECT * FROM {$this->tableName} WHERE id = {$id} AND canceled = 0 LIMIT 1";

                $statement = $this->conn->prepare($query);
                $statement->execute();

                $carpoolRequest = $statement->fetch(PDO::FETCH_ASSOC);

                return json_encode($carpoolRequest);

            } catch (Exception $e) {
                echo "Exception: {$e->getMessage()}";
            }
        }

        public function getCarpoolRequestsByUserId($userId) {
            try {
                $query = "SELECT * FROM {$this->tableName} WHERE user_id = {$userId} AND start_date > NOW() AND canceled = 0 ORDER BY start_date";

                $statement = $this->conn->prepare($query);
                $statement->execute();

                $carpoolRequests = $statement->fetchAll(PDO::FETCH_ASSOC);

                return json_encode($carpoolRequests);
                
            } catch(Exception $e) {
                echo "Exception: {$e->getMessage()}";
            }
        }

        public function getCarpoolRequestsFromOtherUsers($userId){
            try {
                $query = "SELECT * FROM {$this->tableName} WHERE user_id != {$userId} AND start_date > NOW() AND canceled = 0 ORDER BY start_date";

                $statement = $this->conn->prepare($query);
                $statement->execute();

                $carpoolRequests = $statement->fetchAll(PDO::FETCH_ASSOC);

                return json_encode($carpoolRequests);
                
            } catch(Exception $e) {
                echo "Exception: {$e->getMessage()}";
            }
        }

        public function cancelCarpoolRequest($id) {
            try { 
                $query = "UPDATE {$this->tableName} SET canceled = 1 WHERE id = {$id}";

                $stmt = $this->conn->prepare($query);

                $stmt->execute();

                return true;

            } catch (Exception $e) {
                echo "Exception: {$e->getMessage()}";
            }
        }
    }
?>