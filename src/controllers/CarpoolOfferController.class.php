<?php
    include_once("repositories/CarpoolOfferRepository.class.php");

    class CarpoolOfferController {

        private static $carpoolOfferRepository;

        public function __construct() {
            self::$carpoolOfferRepository = new CarpoolOfferRepository();
        }

        public static function createCarpoolOffer($carpoolOffer) {
            if(!is_object($carpoolOffer))
                return json_encode(array('status'=>'400', 'message'=>'Bad Request'));
                
            if(isset($carpoolOffer->user_id) && isset($carpoolOffer->phone) && isset($carpoolOffer->from_city) 
            && isset($carpoolOffer->from_neighborhood) && isset($carpoolOffer->from_street) && isset($carpoolOffer->to_city) 
            && isset($carpoolOffer->to_neighborhood) && isset($carpoolOffer->to_street) && isset($carpoolOffer->start_date)
            && isset($carpoolOffer->end_date) && isset($carpoolOffer->available_vacancies)){

                $carpoolOffer = get_object_vars($carpoolOffer);   
                if(count($carpoolOffer) != 11) {
                    return json_encode(array('status'=>'400', 'message'=>'Bad Request'));
                } else {
                    return self::$carpoolOfferRepository->createCarpoolOffer($carpoolOffer);
                }

            } else {
                return json_encode(array('status'=>'400', 'message'=>'Bad Request'));
            }
        }

        public static function getCarpoolOffers() {
            return self::$carpoolOfferRepository->getCarpoolOffers();
        }

        public static function getCarpoolOfferById($id) {
            return self::$carpoolOfferRepository->getCarpoolOfferById($id);
        }

        public static function getCarpoolOffersByUserId($userId) {
            return self::$carpoolOfferRepository->getCarpoolOffersByUserId($userId);
        }
        
        public static function getCarpoolOffersFromOtherUsers($userId) {
            return self::$carpoolOfferRepository->getCarpoolOffersFromOtherUsers($userId);
        }

        public static function cancelCarpoolOffer($userId) {
            return "cancelCarpoolOffer({$userId})";
        }

        public static function addCarpoolRequestVacancy($userId) {
            return "addCarpoolRequestVacancy({$userId})";
        }

        public static function removeCarpoolRequestVacancy($userId) {
            return "removeCarpoolRequestVacancy({$userId})";
        }
    }
?>