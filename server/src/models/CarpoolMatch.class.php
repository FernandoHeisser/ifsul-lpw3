<?php
    include_once("interfaces/ICarpoolMatch.php");

    class CarpoolMatch implements ICarpoolMatch {
        private $id;
	    private $carpoolRequestId;
	    private $carpoolOfferId;
	    private $accepted = false;
        private $canceled = false;

        function __construct($carpoolRequestId, $carpoolOfferId) {
            $this->carpoolRequestId = $carpoolRequestId;
            $this->carpoolOfferId = $carpoolOfferId;
        }

        public function getId() {
            return $this->id;
        }
        public function getCarpoolRequestId() {
            return $this->carpoolRequestId;
        }
        public function getCarpoolOfferId() {
            return $this->carpoolOfferId;
        }

        public function setAccepted() {
            $this->accepted = true;
        }
        public function setCanceled() {
            $this->canceled = true;
        }
        public function getAccepted() {
            return $this->accepted;
        }
        public function getCanceled() {
            return $this->canceled;
        }
    }
?>