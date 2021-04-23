<?php
    include_once("./controllers/RequestController.class.php");
    include_once("./controllers/UserController.class.php");
    include_once("./controllers/CarpoolRequestController.class.php");
    include_once("./controllers/CarpoolOfferController.class.php");
    include_once("./controllers/CarpoolMatchController.class.php");

    class Router {
        private static $response;

        private static $requestController;

        private static $userController;
        private static $carpoolRequestController;
        private static $carpoolOfferController;
        private static $carpoolMatchController;

        public function __construct($request, $body) {

            self::$requestController = new RequestController($request, $body);

            self::$userController = new UserController();
            self::$carpoolRequestController = new CarpoolRequestController();
            self::$carpoolOfferController = new CarpoolOfferController();
            self::$carpoolMatchController = new CarpoolMatchController();

            self::controller(json_decode(self::$requestController->getRequest()));
        }

        public static function getResponse() {
            return self::$response;
        }

        private static function controller($request) {

            switch ($request->message) {
        
                case 'api/login/':
        
                    self::$response = self::$userController::login($request->body);
                    break;
                
                case 'api/user/':
        
                    self::$response = self::$userController::createUser($request->body);
                    break;
            
                case 'api/users/':
            
                    self::$response = self::$userController::getUsers();
                    break;
            
                case 'api/user/:id':
            
                    self::$response = self::$userController::getUserById($request->param);
                    break;
            
                case 'api/carpool/request/':
            
                    self::$response = self::$carpoolRequestController::createCarpoolRequest($request->body);
                    break;
            
                case 'api/carpool/requests/':
            
                    self::$response = self::$carpoolRequestController::getCarpoolRequests();
                    break;
            
                case 'api/carpool/request/:id':
            
                    self::$response = self::$carpoolRequestController::getCarpoolRequestById($request->param);
                    break;
            
                case 'api/carpool/requests/others/:id':
            
                    self::$response = self::$carpoolRequestController::getCarpoolRequestFromOtherUsers($request->param);
                    break;
            
                case 'api/carpool/requests/user/:id':
            
                    self::$response = self::$carpoolRequestController::getCarpoolRequestByUserId($request->param);
                    break;
            
                case 'api/carpool/offer/':
            
                    self::$response = self::$carpoolOfferController::createCarpoolOffer($request->body);
                    break;
            
                case 'api/carpool/offers/':
            
                    self::$response = self::$carpoolOfferController::getCarpoolOffers();
                    break;
            
                case 'api/carpool/offer/:id':
            
                    self::$response = self::$carpoolOfferController::getCarpoolOfferById($request->param);
                    break;
            
                case 'api/carpool/offers/others/:id':
            
                    self::$response = self::$carpoolOfferController::getCarpoolOffersFromOtherUsers($request->param);
                    break;
            
                case 'api/carpool/offers/user/:id':
            
                    self::$response = self::$carpoolOfferController::getCarpoolOffersByUserId($request->param);
                    break;
            
                case 'api/carpool/match/':
            
                    self::$response = self::$carpoolMatchController::createCarpoolMatch($request->body);
                    break;
            
                case 'api/carpool/match/:id':
            
                    self::$response = self::$carpoolMatchController::getCarpoolMatchById($request->param);
                    break;
            
                case 'api/carpool/match/request/:id':
            
                    self::$response = self::$carpoolMatchController::getCarpoolMatchsByCarpoolRequestId($request->param);
                    break;
            
                case 'api/carpool/match/offer/:id':
            
                    self::$response = self::$carpoolMatchController::getCarpoolMatchsByCarpoolOfferId($request->param);
                    break;
            
                case 'api/carpool/match/offer/:id/request/:id':
            
                    self::$response = self::$carpoolMatchController::getCarpoolMatchsByCarpoolOfferIdAndCarpoolRequestId($request->params[0], $request->params[1]);
                    break;

                case 'api/carpool/match/accept/offer/:id/request/:id':
        
                    self::$response = self::$carpoolMatchController::acceptCarpoolMatch($request->params[0], $request->params[1]);
                    break;

                case 'api/cancel/request/:id':
            
                    self::$response = self::$carpoolRequestController::cancelCarpoolRequest($request->param);
                    break;

                case 'api/cancel/offer/:id':
            
                    self::$response = self::$carpoolOfferController::cancelCarpoolOffer($request->param);
                    break;

                case 'api/vacancy/add/:id':
            
                    self::$response = self::$carpoolOfferController::addCarpoolOfferVacancy($request->param);
                    break;

                case 'api/vacancy/remove/:id':
            
                    self::$response = self::$carpoolOfferController::removeCarpoolOfferVacancy($request->param);
                    break;
                
                default:
                    self::$response = json_encode($request);
                    break;
            }
        }
    }
?>
