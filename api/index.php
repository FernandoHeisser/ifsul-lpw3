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
            include_once("models/CarpoolRequest.class.php");
            include_once("models/CarpoolOffer.class.php");
            include_once("models/CarpoolMatch.class.php");
            include_once("models/User.class.php");

            $user1 = new User(
                'fernando.heisserch@gmail.com',
                'Fernando Costa Heisser',
                '04310299032',
                '123',
                '51995258425',
            );
            $user1->setCity('Charqueadas');
            $user1->setNeighborhood('Centro');
            $user1->setStreet('Patricio Ferreira');
            $user1->setFacebook('facebook.com/fernando.heisser/');
            $user1->setInstagram('instagram.com/fernando_heisser/');
            $user1->setTwitter('https://twitter.com/fernandoheisser');
            
            $user2 = new User(
                "nanandofixa@gmail.com",
                "Nanando Fixa",
                "04310299031",
                "123",
                "51995258424"
            );
            
            $userRepository = new UserRepository();
            $user1Id = $userRepository->createUser($user1);
            $user2Id = $userRepository->createUser($user2);
            
            echo($userRepository->getUsers());

            $carpoolRequest = new CarpoolRequest(
                $user1Id,
                '51995258425',
                'Charqueadas',
                'Centro',
                'Patricio Ferreira',
                'Charqueadas',
                'Centro',
                'Rua de tal',
                '2021-03-31 10:15:00',
                '2021-03-31 10:30:00'
            );

            $carpoolOffer = new CarpoolOffer(
                $user2Id,
                '51995258424',
                'Charqueadas',
                'Centro',
                'Patricio Ferreira',
                'Charqueadas',
                'Centro',
                'Rua de tal',
                '2021-03-31 10:15:00',
                '2021-03-31 10:30:00',
                4
            );

            $carpoolRequestRepository = new CarpoolRequestRepository();
            $carpoolRequestId = $carpoolRequestRepository->createCarpoolRequest($carpoolRequest);
            
            $carpoolOfferRepository = new CarpoolOfferRepository();
            $carpoolOfferId = $carpoolOfferRepository->createCarpoolOffer($carpoolOffer);
            
            $carpoolMatch = new CarpoolMatch(
                $carpoolRequestId,
                $carpoolOfferId
            );

            $carpoolMatchRepository = new CarpoolMatchRepository();
            $result = $carpoolMatchRepository->createCarpoolMatch($carpoolMatch);
        ?>
    </body>
</html>