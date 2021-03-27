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

            $userRepository = new UserRepository();

            echo($userRepository->getUsers());
        ?>
    </body>
</html>