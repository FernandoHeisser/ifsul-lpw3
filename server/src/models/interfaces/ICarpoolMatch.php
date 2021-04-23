<?php
    interface ICarpoolMatch {

        public function getId();
        public function getCarpoolRequestId();
        public function getCarpoolOfferId();

        public function setAccepted();
        public function setCanceled();
        public function getAccepted();
        public function getCanceled();
    }
?>