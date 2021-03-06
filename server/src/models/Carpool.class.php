<?php
    abstract class Carpool {
        private $id;
        private $userId;
        private $phone;
        private $fromCity;
        private $fromNeighborhood;
        private $fromStreet;
        private $toCity;
        private $toNeighborhood;
        private $toStreet;
        private $startDate;
        private $endDate;
        private $canceled = false;

        function __construct($userId, $phone, $fromCity, $fromNeighborhood, $fromStreet, $toCity, $toNeighborhood, $toStreet, $startDate, $endDate) {
            $this->userId = $userId;
            $this->phone = $phone;
            $this->fromCity = $fromCity;
            $this->fromNeighborhood = $fromNeighborhood;
            $this->fromStreet = $fromStreet;
            $this->toCity = $toCity;
            $this->toNeighborhood = $toNeighborhood;
            $this->toStreet = $toStreet;
            $this->startDate = $startDate;
            $this->endDate = $endDate;
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
            return $this->startDate;
        }
        public function getEndDate() {
            return $this->endDate;
        }
        public function getCanceled() {
            return $this->canceled;
        }
        public function setCanceled() {
            $this->canceled = true;
        }
    }
?>