<?php
    include_once("Router.class.php");

    if(!empty($_REQUEST['url'])) {

        $request_url = $_REQUEST['url'];
        $request_body = file_get_contents('php://input');

        $router = new Router($request_url, $request_body);

        echo $router::getResponse();

    } else {
        echo json_encode(array('status'=>'400', 'message'=>'Bad Request'));
    }
?>