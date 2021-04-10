<?php
    include_once("./controllers/RequestController.class.php");

    class Router {
        private static $response;

        private static $requestController;

        public function __construct($request, $body) {

            self::$requestController = new RequestController($request, $body);
            self::controller(json_decode(self::$requestController->getRequest()));
        }

        public static function getResponse() {
            return self::$response;
        }

        private static function controller($request) {

            switch ($request->message) {
        
                case 'api/user/':
        
                    self::$response = $request->message;
                    break;
            
                case 'api/users/':
            
                    self::$response = $request->message;
                    break;
            
                case 'api/user/:id':
            
                    self::$response = $request->message;
                    break;
            
                case 'api/carpool/request/':
            
                    self::$response = $request->message;
                    break;
            
                case 'api/carpool/requests/':
            
                    self::$response = $request->message;
                    break;
            
                case 'api/carpool/request/:id':
            
                    self::$response = $request->message;
                    break;
            
                case 'api/carpool/requests/others/:id':
            
                    self::$response = $request->message;
                    break;
            
                case 'api/carpool/requests/user/:id':
            
                    self::$response = $request->message;
                    break;
            
                case 'api/carpool/offer/':
            
                    self::$response = $request->message;
                    break;
            
                case 'api/carpool/offers/':
            
                    self::$response = $request->message;
                    break;
            
                case 'api/carpool/offer/:id':
            
                    self::$response = $request->message;
                    break;
            
                case 'api/carpool/offers/others/:id':
            
                    self::$response = $request->message;
                    break;
            
                case 'api/carpool/offers/user/:id':
            
                    self::$response = $request->message;
                    break;
            
                case 'api/carpool/match/':
            
                    self::$response = $request->message;
                    break;
            
                case 'api/carpool/match/:id':
            
                    self::$response = $request->message;
                    break;
            
                case 'api/carpool/match/request/:id':
            
                    self::$response = $request->message;
                    break;
            
                case 'api/carpool/match/offer/:id':
            
                    self::$response = $request->message;
                    break;
            
                case 'api/carpool/match/offer/:id/request/:id':
            
                    self::$response = $request->message;
                    break;
                
                default:
                    self::$response = $request->message;
                    break;
            }
        }
    }
?>
