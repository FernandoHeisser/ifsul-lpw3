<?php
    include_once("repositories/CarpoolOfferRepository.class.php");

    class CarpoolOfferController {

        private $carpoolOfferRepository;

        public function __construct() {
            
            $this->carpoolOfferRepository = new CarpoolOfferRepository();
            
        }

        #echo($carpoolOfferRepository->getCarpoolOffers());
        #echo($carpoolOfferRepository->getCarpoolOfferById(4));
        #echo($carpoolOfferRepository->getCarpoolOffersByUserId(1));
        #echo($carpoolOfferRepository->getCarpoolOffersFromOtherUsers(1));
    }
?>