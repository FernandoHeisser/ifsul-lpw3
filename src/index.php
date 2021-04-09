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
            #echo($userRepository->getUserById(1));
            #echo($userRepository->getUserById(2));

            $carpoolRequestRepository = new CarpoolRequestRepository();
            #echo($carpoolRequestRepository->getCarpoolRequests());
            #echo($carpoolRequestRepository->getCarpoolRequestById(1));
            #echo($carpoolRequestRepository->getCarpoolRequestByUserId(1));
            #echo($carpoolRequestRepository->getCarpoolRequestFromOtherUsers(1));

            $carpoolOfferRepository = new CarpoolOfferRepository();
            #echo($carpoolOfferRepository->getCarpoolOffers());
            #echo($carpoollOfferRepository->getCarpoolOfferById(1));
            #echo($carpoollOfferRepository->getCarpoolOfferByUserId(1));
            #echo($carpoollOfferRepository->getCarpoolOfferFromOtherUsers(1));

            $carpoolMatchRepository = new CarpoolMatchRepository();
            #echo($carpoolMatchRepository->getCarpoolMatchById(1));
            #echo($carpoolMatchRepository->getCarpoolMatchsByCarpoolOfferId(1));
            #echo($carpoolMatchRepository->getCarpoolMatchsByCarpoolRequestId(1));
            #echo($carpoolMatchRepository->getCarpoolMatchsByCarpoolOfferIdAndCarpoolRequestId(1, 1));
        ?>
    </body>
</html>