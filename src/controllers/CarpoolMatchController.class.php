<?php
    include_once("repositories/CarpoolMatchRepository.class.php");

    class CarpoolMatchController {

        private $carpoolMatchRepository;

        public function __construct() {
            
            $this->carpoolMatchRepository = new CarpoolMatchRepository();
            
        }

        #echo($carpoolMatchRepository->getCarpoolMatchById(5));
        #echo($carpoolMatchRepository->getCarpoolMatchsByCarpoolOfferId(1));
        #echo($carpoolMatchRepository->getCarpoolMatchsByCarpoolRequestId(1));
        #echo($carpoolMatchRepository->getCarpoolMatchsByCarpoolOfferIdAndCarpoolRequestId(1, 1));
    }
?>