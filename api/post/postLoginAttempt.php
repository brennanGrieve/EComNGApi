<?php
    require(__DIR__.'/postConn.php');

    /**
     * Here, we receive a username and a password. Need to get the username, passhash, and salt from the database based on the username given. Then,
     * we need to concatenate the password to the salt and hash it to compare it with the password hash. If the evaluation is true, the correct
     * password has been given and we can respond with a token cookie to be sent with any actions that require authentication.
     */

    $obj = json_decode(file_get_contents('php://input'));
    $user = $obj->user;
    $pass = $obj->pass;
    $statement = $conn->prepare('SELECT redacted, redacted FROM redacted WHERE redacted = ?');
    $statement->execute(array($user));
    $userAuth = $statement->fetch();
    if($userAuth == null){
        echo json_encode(array('failed' => '1'));
    }else{
        $hashedPass = hash("sha512", $pass.$userAuth->salt);
        if($userAuth->passhash == $hashedPass){
            require(__DIR__.'/../auth/refreshAuthToken.php');
            echo $authJSON;
        }else{
            echo json_encode(array('failed' => '1'));
        }
    }
?>