<?php
    class CarpoolOffer {
        private $id;
        private $userId;
        private $phone;
        private $fromCity;
        private $fromNeighborhood;
        private $fromStreet;
        private $toCity;
        private $toNeighborhood;
        private $toStreet;
        private $starDate;
        private $endDate;
        private $availableVacancies;
        private $done = false;
        private $canceled = false;

        function __construct($userId, $phone, $fromCity, $fromNeighborhood, $fromStreet, $toCity, $toNeighborhood, $toStreet, $starDate, $endDate, $availableVacancies) {
            $this->userId = $userId;
            $this->phone = $phone;
            $this->fromCity = $fromCity;
            $this->fromNeighborhood = $fromNeighborhood;
            $this->fromStreet = $fromStreet;
            $this->toCity = $toCity;
            $this->toNeighborhood = $toNeighborhood;
            $this->toStreet = $toStreet;
            $this->starDate = $starDate;
            $this->endDate = $endDate;
            $this->availableVacancies = $availableVacancies;
        }

        public function getId() {
            return $this->id;
        }
        public function getUserId() {
            return $this->userId;
        }
        public function getPhone() {
            return $this->phone;
        }
        public function getFromCity() {
            return $this->fromCity;
        }
        public function getFromNeighborhood() {
            return $this->fromNeighborhood;
        }
        public function getFromStreet() {
            return $this->fromStreet;
        }
        public function getToCity() {
            return $this->toCity;
        }
        public function getToNeighborhood() {
            return $this->toNeighborhood;
        }
        public function getToStreet() {
            return $this->toStreet;
        }
        public function getStartDate() {
            return $this->starDate;
        }
        public function getEndDate() {
            return $this->endDate;
        }
        public function getDone() {
            return $this->done;
        }
        public function getCanceled() {
            return $this->canceled;
        }
        public function getAvailableVacancies() {
            return $this->availableVacancies;
        }

        public function setDone() {
            $this->done = true;
        }
        public function setCanceled() {
            $this->canceled = true;
        }

        public function addAvailableVacancies() {
            $this->availableVacancies++;
        }
        public function removeAvailableVacancies() {
            $this->availableVacancies--;
        }
    }
?>