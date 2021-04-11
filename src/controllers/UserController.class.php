<?php
    include_once("repositories/UserRepository.class.php");

    class UserController {

        private static $userRepository;

        public function __construct() {
            
            self::$userRepository = new UserRepository();
            
        }

        public static function getUsers() {
            return self::$userRepository->getUsers();
        }
    }
?>