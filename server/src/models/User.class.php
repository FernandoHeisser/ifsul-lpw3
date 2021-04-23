<?php
    include_once("interfaces/IUser.php");
    
    class User implements IUser {
        private $id;
        private $email;
        private $name;
        private $password;
        function __construct($email, $name, $password) {
            $this->email = $email;
            $this->name = $name;
            $this->password = $password;
        }

        public function getId() {
            return $this->id;
        }
        public function getEmail() {
            return $this->email;
        }
        public function getName() {
            return $this->name;
        }
        public function getPassword() {
            return $this->password;
        }
    }
?>