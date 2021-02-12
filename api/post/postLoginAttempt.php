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
        echo null;
    }else{
        $hashedPass = hash("sha512", $pass.$userAuth->salt);
        if($userAuth->passhash == $hashedPass){
            //Correct password has been given, send appopriate auth token. Research best practices for security and possible attack variants before continuing.
            $newRandom = random_bytes(512);
            $newAuthToken = hash("sha512", $newRandom);
            $tokenStatement = $conn->prepare('UPDATE redacted SET redacted = ? WHERE redacted = ?');
            $tokenStatement->execute(array($newAuthToken, $user));
            //Encode auth token in JSON and echo it back to the client
            $authJSON = json_encode($newAuthToken);
            echo $authJSON;
        }
    }
?>