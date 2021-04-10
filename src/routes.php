<?php

    include_once("./controllers/RequestController.class.php");
    
    $request_url = $_REQUEST['url'];
    $request_body = file_get_contents('php://input');

    $router = new RequestController($request_url, $request_body);

    $request = json_decode($router::getRequest());

    if($request->message == 'api/user/') {
        echo $request->message;
    }
    else if($request->message == 'api/users/') {
        echo $request->message;
    }
    else if($request->message == 'api/user/:id') {
        echo $request->message;
    }
    else if($request->message == 'api/carpool/request/') {
        echo $request->message;
    }
    else if($request->message == 'api/carpool/requests/') {
        echo $request->message;
    }
    else if($request->message == 'api/carpool/request/:id') {
        echo $request->message;
    }
    else if($request->message == 'api/carpool/requests/others/:id') {
        echo $request->message;
    }
    else if($request->message == 'api/carpool/requests/user/:id') {
        echo $request->message;
    }
    else if($request->message == 'api/carpool/offer/') {
        echo $request->message;
    }
    else if($request->message == 'api/carpool/offers/') {
        echo $request->message;
    }
    else if($request->message == 'api/carpool/offer/:id') {
        echo $request->message;
    }
    else if($request->message == 'api/carpool/offers/others/:id') {
        echo $request->message;
    }
    else if($request->message == 'api/carpool/offers/user/:id') {
        echo $request->message;
    }
    else if($request->message == 'api/carpool/match/') {
        echo $request->message;
    }
    else if($request->message == 'api/carpool/match/:id') {
        echo $request->message;
    }
    else if($request->message == 'api/carpool/match/request/:id') {
        echo $request->message;
    }
    else if($request->message == 'api/carpool/match/offer/:id') {
        echo $request->message;
    }
    else if($request->message == 'api/carpool/match/offer/:id/request/:id') {
        echo $request->message;
    }
    else {
        echo json_encode($request);
    }

?>