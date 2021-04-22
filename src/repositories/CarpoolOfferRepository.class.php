<?php
    include_once("database/connection/connection.php");
    include_once("models/CarpoolOffer.class.php");

    class CarpoolOfferRepository {
        private $conn;
        private $tableName = "carpools_offered";

        public function __construct() {
            $database = new DatabaseConnection();
            
            $this->conn = $database->getConnection();
        }

        public function createCarpoolOffer($carpoolOfferArray) {
            try {
                $carpoolOffer = new CarpoolOffer(
                    $carpoolOfferArray['user_id'], 
                    $carpoolOfferArray['phone'], 
                    $carpoolOfferArray['from_city'], 
                    $carpoolOfferArray['from_neighborhood'], 
                    $carpoolOfferArray['from_street'], 
                    $carpoolOfferArray['to_city'], 
                    $carpoolOfferArray['to_neighborhood'], 
                    $carpoolOfferArray['to_street'], 
                    $carpoolOfferArray['start_date'], 
                    $carpoolOfferArray['end_date'],
                    $carpoolOfferArray['available_vacancies']);

                $query = "INSERT INTO {$this->tableName} (user_id, phone, from_city, from_neighborhood, from_street, to_city, to_neighborhood, to_street, start_date, end_date, available_vacancies, canceled, done)
                    VALUES ( 
                    {$carpoolOffer->getUserId()},
                    '{$carpoolOffer->getPhone()}',
                    '{$carpoolOffer->getFromCity()}',
                    '{$carpoolOffer->getFromNeighborhood()}',
                    '{$carpoolOffer->getFromStreet()}',
                    '{$carpoolOffer->getToCity()}',
                    '{$carpoolOffer->getToNeighborhood()}',
                    '{$carpoolOffer->getToStreet()}',
                    '{$carpoolOffer->getStartDate()}',
                    '{$carpoolOffer->getEndDate()}',
                    '{$carpoolOffer->getAvailableVacancies()}',
                    0,
                    0)";

                $stmt = $this->conn->prepare($query);

                $stmt->execute();

                return $this->conn->lastInsertId();

            } catch(Exception $e) {
                echo "Exception: {$e->getMessage()}";
            }
        }

        public function getCarpoolOffers() {
            try {
                $query = "SELECT * FROM {$this->tableName} WHERE start_date > NOW() AND canceled = 0 ORDER BY start_date";

                $statement = $this->conn->prepare($query);
                $statement->execute();

                $carpoolOffers = $statement->fetchAll(PDO::FETCH_ASSOC);

                return json_encode($carpoolOffers);

            } catch(Exception $e) {
                echo "Exception: {$e->getMessage()}";
            }
        }

        public function getCarpoolOfferById($id) {
            try {
                $query = "SELECT * FROM {$this->tableName} WHERE id = {$id} AND canceled = 0 LIMIT 1";

                $statement = $this->conn->prepare($query);
                $statement->execute();

                $carpoolOffer = $statement->fetch(PDO::FETCH_ASSOC);

                return json_encode($carpoolOffer);

            } catch(Exception $e) {
                echo "Exception: {$e->getMessage()}";
            }
        }

        public function getCarpoolOffersByUserId($userId) {
            try {
                $query = "SELECT * FROM {$this->tableName} WHERE user_id = {$userId} AND start_date > NOW() AND canceled = 0 ORDER BY start_date";

                $statement = $this->conn->prepare($query);
                $statement->execute();

                $carpoolOffers = $statement->fetchAll(PDO::FETCH_ASSOC);

                return json_encode($carpoolOffers);
                
            } catch(Exception $e) {
                echo "Exception: {$e->getMessage()}";
            }
        }

        public function getCarpoolOffersFromOtherUsers($userId) {
            try {
                $query = "SELECT * FROM {$this->tableName} WHERE user_id != {$userId} AND start_date > NOW() AND canceled = 0 ORDER BY start_date";

                $statement = $this->conn->prepare($query);
                $statement->execute();

                $carpoolOffers = $statement->fetchAll(PDO::FETCH_ASSOC);

                return json_encode($carpoolOffers);
                
            } catch(Exception $e) {
                echo "Exception: {$e->getMessage()}";
            }
        }

        public function addCarpoolOfferVacancy($id) {
            try { 
                $query = "UPDATE {$this->tableName} SET available_vacancies = available_vacancies + 1 WHERE id = {$id}";

                $stmt = $this->conn->prepare($query);

                $stmt->execute();

                return true;

            } catch (Exception $e) {
                echo "Exception: {$e->getMessage()}";
            }
        }

        public function removeCarpoolOfferVacancy($id) {
            try { 
                $query = "UPDATE {$this->tableName} SET available_vacancies = available_vacancies - 1 WHERE id = {$id} AND available_vacancies > 0";

                $stmt = $this->conn->prepare($query);

                $stmt->execute();

                return true;

            } catch (Exception $e) {
                echo "Exception: {$e->getMessage()}";
            }
        }

        public function cancelCarpoolOffer($id) {
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