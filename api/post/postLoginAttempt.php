<?php
    require(__DIR__.'/postConn.php');

    /**
     * Here, we receive a username and a password. Need to get the username, passhash, and salt from the database based on the username given. Then,
     * we need to concatenate the password to the salt and hash it to compare it with the password hash. If the evaluation is true, the correct
     * password has been given and we can respond with a token cookie to be sent with any actions that require authentication.
     */

    $obj = json_decode(file_get_contents('php://input'));
    $statement = $conn->prepare('SELECT PASSHASH, salt FROM UserAuthData WHERE USER_NAME = ?');
    $statement->execute(array($obj->user));
    $userAuth = $statement->fetch();
    if($userAuth == null){
        echo json_encode(array('failed' => '1'));
    }else{
        if($userAuth->passhash == hash("sha512", $obj->pass.$userAuth->salt)){
	    $user = $obj->user;
            require(__DIR__.'/../auth/refreshAuthToken.php');
            echo $authJSON;
        }else{
            echo json_encode(array('failed' => '1'));
        }
    }
?>