<?php
    include_once("repositories/CarpoolMatchRepository.class.php");

    class CarpoolMatchController {

        private static $carpoolMatchRepository;

        public function __construct() {
            self::$carpoolMatchRepository = new CarpoolMatchRepository();
        }

        public static function getCarpoolMatchById($id) {
            return self::$carpoolMatchRepository->getCarpoolMatchById($id);
        }

        public static function getCarpoolMatchsByCarpoolOfferId($carpoolOfferId) {
            return self::$carpoolMatchRepository->getCarpoolMatchsByCarpoolOfferId($carpoolOfferId);
        }

        public static function getCarpoolMatchsByCarpoolRequestId($carpoolRequestId) {
            return self::$carpoolMatchRepository->getCarpoolMatchsByCarpoolRequestId($carpoolRequestId);
        }
        
        public static function getCarpoolMatchsByCarpoolOfferIdAndCarpoolRequestId($carpoolOfferId, $carpoolRequestId) {
            return self::$carpoolMatchRepository->getCarpoolMatchsByCarpoolOfferIdAndCarpoolRequestId($carpoolOfferId, $carpoolRequestId);
        }
    }
?>