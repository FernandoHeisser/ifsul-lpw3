<?php
    include_once("repositories/CarpoolMatchRepository.class.php");
    include_once("repositories/CarpoolOfferRepository.class.php");

    class CarpoolMatchController {

        private static $carpoolMatchRepository;
        private static $carpoolOfferRepository;

        public function __construct() {
            self::$carpoolMatchRepository = new CarpoolMatchRepository();
            self::$carpoolOfferRepository = new CarpoolOfferRepository();
        }

        public static function createCarpoolMatch($carpoolMatch) {
            if(!is_object($carpoolMatch))
                return json_encode(array('status'=>'400', 'message'=>'Bad Request'));
                
            if(isset($carpoolMatch->carpool_request_id) && isset($carpoolMatch->carpool_offer_id)){
                $carpoolMatch = get_object_vars($carpoolMatch);   

                if(count($carpoolMatch) != 2) {
                    return json_encode(array('status'=>'400', 'message'=>'Bad Request'));
                } else {
                    return self::$carpoolMatchRepository->createCarpoolMatch($carpoolMatch);
                }

            } else {
                return json_encode(array('status'=>'400', 'message'=>'Bad Request'));
            }
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

        public static function acceptCarpoolMatch($carpoolOfferId, $carpoolRequestId) {

            self::$carpoolOfferRepository->removeCarpoolOfferVacancy($carpoolOfferId);
            
            return self::$carpoolMatchRepository->acceptCarpoolMatch($carpoolOfferId, $carpoolRequestId);
        }
    }
?>