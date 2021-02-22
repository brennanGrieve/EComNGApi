<?php
    require(__DIR__.'/postConn.php');
    $obj = json_decode(file_get_contents('php://input'));
    $passToCheck = $obj->oldPass;
    $getSalt = $conn->prepare("SELECT salt FROM UserAuthData WHERE authToken = ?");
    $getSalt->execute(array($_COOKIE["auth"]));
    $saltResult =  $getSalt->fetch(PDO::FETCH_OBJ);
    echo $saltResult;
    $salt = random_bytes(512);
    $pass = $obj->pass1;
    $hashedPass = hash("SHA512", $pass.$salt);
    $statement = $conn->prepare("UPDATE UserAuthData SET PASSHASH = ? WHERE authToken = ?");
    $statement->execute(array($hashedPass, $_COOKIE["auth"]));
?>