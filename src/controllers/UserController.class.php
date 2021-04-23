<?php
    include_once("repositories/UserRepository.class.php");

    class UserController {

        private static $userRepository;

        public function __construct() {
            self::$userRepository = new UserRepository(); 
        }

        public static function createUser($user) {
            if(!is_object($user))
                return json_encode(array('status'=>'400', 'message'=>'Bad Request'));
                
            if(isset($user->email) && isset($user->name) && isset($user->cpf) 
            && isset($user->password) && isset($user->phone) && isset($user->city) 
            && isset($user->neighborhood) && isset($user->street) && isset($user->facebook) 
            && isset($user->instagram) && isset($user->twitter) && isset($user->photo)){
                
                $user = get_object_vars($user);   
                if(count($user) != 12) {
                    return json_encode(array('status'=>'400', 'message'=>'Bad Request'));
                } else {
                    return self::$userRepository->createUser($user);
                }

            } else {
                return json_encode(array('status'=>'400', 'message'=>'Bad Request'));
            }    

        }

        public static function getUsers() {
            return self::$userRepository->getUsers();
        }

        public static function getUserById($id) {
            return self::$userRepository->getUserById($id);
        }

        public static function login($body) {
            if(isset($body->email) && isset($body->password))
                return self::$userRepository->login($body->email, $body->password);
            else
                return json_encode(array('status'=>'400', 'message'=>'Bad Request'));
        }
    }
?>