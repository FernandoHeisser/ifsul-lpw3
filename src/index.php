<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LPW3</title>
    </head>
    <body>
        <?php
            include_once("repositories/CarpoolRequestRepository.class.php");
            include_once("repositories/CarpoolOfferRepository.class.php");
            include_once("repositories/CarpoolMatchRepository.class.php");
            include_once("repositories/UserRepository.class.php");
            $userRepository = new UserRepository();
            echo($userRepository->getUsers());

            $carpoolRequestRepository = new CarpoolRequestRepository();
            //echo($carpoolRequestRepository->getCarpoolRequests());

            $carpoolOfferRepository = new CarpoolOfferRepository();
            //echo($carpoolOfferRepository->getCarpoolOffers());

            $carpoolMatchRepository = new CarpoolMatchRepository();
            //echo($carpoolMatchRepository->getCarpoolMatchById(1));
        ?>
    </body>
</html>