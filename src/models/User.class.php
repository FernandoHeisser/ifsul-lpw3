<?php
    class User {
        private $id;
        private $email;
        private $name;
        private $cpf;
        private $password;
        private $phone;
        private $city;
        private $neighborhood;
        private $street;
        private $facebook;
        private $instagram;
        private $twitter;
        private $photo;
        private $carpoolDone = 0;
        private $carpoolCanceled = 0;
        private $carpoolOffered = 0;
        private $carpoolRequested = 0;

        function __construct($email, $name, $cpf, $password, $phone) {
            $this->email = $email;
            $this->name = $name;
            $this->cpf = $cpf;
            $this->password = $password;
            $this->phone = $phone;
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
        public function getCpf() {
            return $this->cpf;
        }
        public function getPassword() {
            return $this->password;
        }
        public function getPhone() {
            return $this->phone;
        }

        public function setCity($city){
            $this->city = $city;
        }
        public function setNeighborhood($neighborhood){
            $this->neighborhood = $neighborhood;
        }
        public function setStreet($street){
            $this->street = $street;
        }
        public function setFacebook($facebook){
            $this->facebook = $facebook;
        }
        public function setInstagram($instagram){
            $this->instagram = $instagram;
        }
        public function setTwitter($twitter){
            $this->twitter = $twitter;
        }
        public function setPhoto($photo){
            $this->photo = $photo;
        }

        public function getCity(){
            return $this->city;
        }
        public function getNeighborhood(){
            return $this->neighborhood;
        }
        public function getStreet(){
            return $this->street;
        }
        public function getFacebook(){
            return $this->facebook;
        }
        public function getInstagram(){
            return $this->instagram;
        }
        public function getTwitter(){
            return $this->twitter;
        }
        public function getPhoto(){
            return $this->photo;
        }

        public function addCarpoolDone() {
            $this->carpoolDone++;
        }
        public function addCarpoolCanceled() {
            $this->carpoolCanceled++;
        }
        public function addCarpoolOffered() {
            $this->carpoolOffered++;
        }
        public function addCarpoolRequested() {
            $this->carpoolRequested++;
        }

        public function getCarpoolDone() {
            return $this->carpoolDone;
        }
        public function getCarpoolCanceled() {
            return $this->carpoolCanceled;
        }
        public function getCarpoolOffered() {
            return $this->carpoolOffered;
        }
        public function getCarpoolRequested() {
            return $this->carpoolRequested;
        }
    }
?>