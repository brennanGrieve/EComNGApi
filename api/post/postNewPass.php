<?php
    require(__DIR__.'/postConn.php');
    $obj = json_decode(file_get_contents('php://input'));
    $salt = random_bytes(512);
    $pass = $obj->pass1;
    $hashedPass = hash("SHA512", $pass.$salt);
    $statement = $conn->prepare("UPDATE UserAuthData SET PASSHASH = ? WHERE authToken = ?");
    $conn->execute(array($hashedPass, $_COOKIE["auth"]));
    require(__DIR__.'/../auth/refreshAuthToken.php');
    echo $authJSON;
?>