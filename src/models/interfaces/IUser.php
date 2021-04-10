<?php
    interface IUser {
        
        public function getId() ;
        public function getEmail() ;
        public function getName() ;
        public function getCpf() ;
        public function getPassword() ;
        public function getPhone() ;

        public function setCity($city);
        public function setNeighborhood($neighborhood);
        public function setStreet($street);
        public function setFacebook($facebook);
        public function setInstagram($instagram);
        public function setTwitter($twitter);
        public function setPhoto($photo);

        public function getCity();
        public function getNeighborhood();
        public function getStreet();
        public function getFacebook();
        public function getInstagram();
        public function getTwitter();
        public function getPhoto();

        public function addCarpoolDone() ;
        public function addCarpoolCanceled() ;
        public function addCarpoolOffered() ;
        public function addCarpoolRequested() ;

        public function getCarpoolDone() ;
        public function getCarpoolCanceled() ;
        public function getCarpoolOffered() ;
        public function getCarpoolRequested() ;
    }
?>