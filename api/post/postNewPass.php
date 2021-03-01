<?php
    require(__DIR__.'/postConn.php');
    $obj = json_decode(file_get_contents('php://input'));
    $passToCheck = $obj[1];
    $getSalt = $conn->prepare("SELECT salt, PASSHASH FROM UserAuthData WHERE authToken = ?");
    $getSalt->execute(array($_COOKIE["auth"]));
    $saltResult =  $getSalt->fetch(PDO::FETCH_OBJ);
    $pass = $obj[0];
    $hashToCheck = hash("SHA512", $passToCheck.$saltResult->salt);
    if($hashToCheck == $saltResult->PASSHASH){
        $hashedPass = hash("SHA512", $pass.$saltResult->salt);
        $statement = $conn->prepare("UPDATE UserAuthData SET PASSHASH = ? WHERE authToken = ?");
        $statement->execute(array($hashedPass, $_COOKIE["auth"]));
        require(__DIR__.'/../auth/refreshAuthToken.php');
        echo $authJSON;
    }else{
        echo json_encode(array('failed' => '1'));
    }
?>