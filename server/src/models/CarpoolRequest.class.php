<?php
    include_once("interfaces/ICarpoolRequest.php");
    include_once("Carpool.class.php");

    class CarpoolRequest extends Carpool implements ICarpoolRequest {

        function __construct($userId, $phone, $fromCity, $fromNeighborhood, $fromStreet, $toCity, $toNeighborhood, $toStreet, $startDate, $endDate) {
            parent::__construct($userId, $phone, $fromCity, $fromNeighborhood, $fromStreet, $toCity, $toNeighborhood, $toStreet, $startDate, $endDate);
        }
    }
?>