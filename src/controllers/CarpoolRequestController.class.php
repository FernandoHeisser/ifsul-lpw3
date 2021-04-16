<?php
    include_once("repositories/CarpoolRequestRepository.class.php");

    class CarpoolRequestController {

        private static $carpoolRequestRepository;

        public function __construct() {
            self::$carpoolRequestRepository = new CarpoolRequestRepository();
        }

        public static function createCarpoolRequest(CarpoolRequest $carpoolRequest) {
            return self::$carpoolRequestRepository->createCarpoolRequest($carpoolRequest);
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