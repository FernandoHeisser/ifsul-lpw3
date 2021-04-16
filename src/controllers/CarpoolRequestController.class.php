<?php
    include_once("repositories/CarpoolRequestRepository.class.php");

    class CarpoolRequestController {

        private static $carpoolRequestRepository;

        public function __construct() {
            self::$carpoolRequestRepository = new CarpoolRequestRepository();
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
    }
?>