<?php
    include_once("interfaces/ICarpoolOffer.php");
    include_once("Carpool.class.php");

    class CarpoolOffer extends Carpool implements ICarpoolOffer {
        private $availableVacancies;

        function __construct($userId, $phone, $fromCity, $fromNeighborhood, $fromStreet, $toCity, $toNeighborhood, $toStreet, $startDate, $endDate, $availableVacancies) {
            parent::__construct($userId, $phone, $fromCity, $fromNeighborhood, $fromStreet, $toCity, $toNeighborhood, $toStreet, $startDate, $endDate);
            $this->availableVacancies = $availableVacancies;
        }

        public function getAvailableVacancies() {
            return $this->availableVacancies;
        }

        public function addAvailableVacancies() {
            $this->availableVacancies++;
        }

        public function removeAvailableVacancies() {
            $this->availableVacancies--;
        }
    }
?>