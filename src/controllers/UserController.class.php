<?php
    include_once("repositories/UserRepository.class.php");

    class UserController {

        private static $userRepository;

        public function __construct() {
            self::$userRepository = new UserRepository(); 
        }

        public static function createUser($user) {
            return self::$userRepository->createUser($user);
        }

        public static function getUsers() {
            return self::$userRepository->getUsers();
        }

        public static function getUserById($id) {
            return self::$userRepository->getUserById($id);
        }
    }
?>