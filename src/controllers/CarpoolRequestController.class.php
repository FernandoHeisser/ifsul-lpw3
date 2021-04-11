<?php
    include_once("repositories/CarpoolRequestRepository.class.php");

    class CarpoolRequestController {

        private $carpoolRequestRepository;

        public function __construct() {
            
            $this->carpoolRequestRepository = new CarpoolRequestRepository();
            
        }

        #echo($carpoolRequestRepository->getCarpoolRequests());
        #echo($carpoolRequestRepository->getCarpoolRequestById(1));
        #echo($carpoolRequestRepository->getCarpoolRequestByUserId(2));
        #echo($carpoolRequestRepository->getCarpoolRequestFromOtherUsers(2));
    }
?>