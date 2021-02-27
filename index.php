<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LPW3</title>
    </head>
    <body>
    <h1>LPW3</h1>
        <?php
            include_once("connection.php");
            include_once("models/User.php");
            $user = new User();
            $user->setUsername( "NanandoFixa" );
            $user->setPassword( "12345678" );
            $user->setCon($con);
            $user->login();
        ?>
    </body>
</html>