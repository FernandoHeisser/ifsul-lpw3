<?php
    include_once("repositories/CarpoolRequestRepository.class.php");
    include_once("repositories/CarpoolOfferRepository.class.php");
    include_once("repositories/CarpoolMatchRepository.class.php");

    class CarpoolRequestController {

        private static $carpoolRequestRepository;
        private static $carpoolOfferRepository;
        private static $carpoolMatchRepository;

        public function __construct() {
            self::$carpoolRequestRepository = new CarpoolRequestRepository();
            self::$carpoolOfferRepository = new CarpoolOfferRepository();
            self::$carpoolMatchRepository = new CarpoolMatchRepository();
        }

        public static function createCarpoolRequest($carpoolRequest) {
            if(!is_object($carpoolRequest))
                return json_encode(array('status'=>'400', 'message'=>'Bad Request'));
                
            if(isset($carpoolRequest->user_id) && isset($carpoolRequest->phone) && isset($carpoolRequest->from_city) 
            && isset($carpoolRequest->from_neighborhood) && isset($carpoolRequest->from_street) && isset($carpoolRequest->to_city) 
            && isset($carpoolRequest->to_neighborhood) && isset($carpoolRequest->to_street) && isset($carpoolRequest->start_date)
            && isset($carpoolRequest->end_date)){

                $carpoolRequest = get_object_vars($carpoolRequest);   
                if(count($carpoolRequest) != 10) {
                    return json_encode(array('status'=>'400', 'message'=>'Bad Request'));
                } else {
                    return self::$carpoolRequestRepository->createCarpoolRequest($carpoolRequest);
                }

            } else {
                return json_encode(array('status'=>'400', 'message'=>'Bad Request'));
            }
        }

        public static function getCarpoolRequests() {
            return self::$carpoolRequestRepository->getCarpoolRequests();
        }

        public static function getCarpoolRequestById($id) {
            return self::$carpoolRequestRepository->getCarpoolRequestById($id);
        }

        public static function getCarpoolRequestByUserId($userId) {
            return self::$carpoolRequestRepository->getCarpoolRequestsByUserId($userId);
        }

        public static function getCarpoolRequestFromOtherUsers($userId) {
            return self::$carpoolRequestRepository->getCarpoolRequestsFromOtherUsers($userId);
        }

        public static function cancelCarpoolRequest($id) {
            
            $status = self::$carpoolOfferRepository->cancelCarpoolOffer($id);

            $match = json_decode(self::$carpoolMatchRepository->getCarpoolMatchsByCarpoolRequestId($id));

            if(is_numeric($match[0]->id)) {
                self::$carpoolOfferRepository->removeCarpoolOfferVacancy($match[0]->carpool_offer_id);
                $status = self::$carpoolMatchRepository->cancelCarpoolMatch($match[0]->id);
            }

            return $status;
        }
    }
?>