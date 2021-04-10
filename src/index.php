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
            #echo($userRepository->getUsers());
            #echo($userRepository->getUserById(2));

            $carpoolRequestRepository = new CarpoolRequestRepository();
            #echo($carpoolRequestRepository->getCarpoolRequests());
            #echo($carpoolRequestRepository->getCarpoolRequestById(1));
            #echo($carpoolRequestRepository->getCarpoolRequestByUserId(2));
            #echo($carpoolRequestRepository->getCarpoolRequestFromOtherUsers(2));

            $carpoolOfferRepository = new CarpoolOfferRepository();
            #echo($carpoolOfferRepository->getCarpoolOffers());
            #echo($carpoolOfferRepository->getCarpoolOfferById(4));
            #echo($carpoolOfferRepository->getCarpoolOffersByUserId(1));
            #echo($carpoolOfferRepository->getCarpoolOffersFromOtherUsers(1));

            $carpoolMatchRepository = new CarpoolMatchRepository();
            #echo($carpoolMatchRepository->getCarpoolMatchById(5));
            #echo($carpoolMatchRepository->getCarpoolMatchsByCarpoolOfferId(1));
            #echo($carpoolMatchRepository->getCarpoolMatchsByCarpoolRequestId(1));
            #echo($carpoolMatchRepository->getCarpoolMatchsByCarpoolOfferIdAndCarpoolRequestId(1, 1));
        ?>
    </body>
</html>