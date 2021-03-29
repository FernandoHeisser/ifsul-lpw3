<?php
    class CarpoolMatch {
        private $id;
	    private $carpoolRequestId;
	    private $carpoolOfferId;
	    private $accepted;

        function __construct($carpoolRequestId, $carpoolOfferId) {
            $this->carpoolRequestId = $carpoolRequestId;
            $this->carpoolOfferId = $carpoolOfferId;
        }

        public function getId() {
            return $this->id;
        }
        public function getCarpoolRequest() {
            return $this->carpoolRequestId;
        }
        public function getCarpoolOfferId() {
            return $this->carpoolOfferId;
        }

        public function setAccepted() {
            $this->accepted = true;
        }
        public function getAccepted() {
            return $this->accepted;
        }
    }
?>