<?php
    interface ICarpoolOffer {
       
        public function getId();
        public function getUserId();
        public function getPhone();
        public function getFromCity();
        public function getFromNeighborhood();
        public function getFromStreet();
        public function getToCity();
        public function getToNeighborhood();
        public function getToStreet();
        public function getStartDate();
        public function getEndDate();
        public function getDone();
        public function getCanceled();
        public function getAvailableVacancies();

        public function setDone();
        public function setCanceled();

        public function addAvailableVacancies();
        public function removeAvailableVacancies();
    }
?>