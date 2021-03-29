<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LPW3</title>
    </head>
    <body>
        <?php
            include_once("repositories/UserRepository.class.php");
            include_once("models/User.class.php");

            $userRepository = new UserRepository();

            $user = new User(
                "nanandofixa@gmail.com",
                "Nanando Fixa",
                "04310299032",
                "123",
                "51995258425"
            );
            $userRepository->createUser($user);

            //echo($userRepository->getUsers());
        ?>
    </body>
</html>