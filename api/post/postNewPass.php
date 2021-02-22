<?php
    require(__DIR__.'/postConn.php');
    $obj = json_decode(file_get_contents('php://input'));
    $passToCheck = $obj[1];
    $getSalt = $conn->prepare("SELECT salt, USER_NAME FROM UserAuthData WHERE authToken = ?");
    $getSalt->execute(array($_COOKIE["auth"]));
    $saltResult =  $getSalt->fetch(PDO::FETCH_OBJ);
    $salt = $saltResult->salt;
    $user = $saltResult->USER_NAME;
    $pass = $obj[0];
    $hashedPass = hash("SHA512", $pass.$salt);
    $statement = $conn->prepare("UPDATE UserAuthData SET PASSHASH = ? WHERE authToken = ?");
    $statement->execute(array($hashedPass, $_COOKIE["auth"]));
    require(__DIR__.'/../auth/refreshAuthToken.php');
    echo $authJSON;
?>