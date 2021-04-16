<?php
    include_once("repositories/CarpoolOfferRepository.class.php");

    class CarpoolOfferController {

        private static $carpoolOfferRepository;

        public function __construct() {
            self::$carpoolOfferRepository = new CarpoolOfferRepository();
        }

        public static function createCarpoolRequest(CarpoolOffer $carpoolOffer) {
            return self::$carpoolOfferRepository->createCarpoolOffer($carpoolOffer);
        }

        public static function getCarpoolRequests() {
            return self::$carpoolOfferRepository->getCarpoolOffers();
        }

        public static function getCarpoolRequestById($id) {
            return self::$carpoolOfferRepository->getCarpoolOfferById($id);
        }

        public static function getCarpoolRequestByUserId($userId) {
            return self::$carpoolOfferRepository->getCarpoolOffersByUserId($userId);
        }
        
        public static function getCarpoolRequestFromOtherUsers($userId) {
            return self::$carpoolOfferRepository->getCarpoolOffersFromOtherUsers($userId);
        }
    }
?>