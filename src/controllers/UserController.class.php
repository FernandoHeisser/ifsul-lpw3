<?php
    include_once("repositories/UserRepository.class.php");

    class UserController {

        
        private $userRepository;

        public function __construct() {
            
            $this->userRepository = new UserRepository();
            
        }

        #echo($userRepository->getUsers());
        #echo($userRepository->getUserById(2));
    }
?>