<?php
    /**
     * Expected input: Array[0] = newPass, Array[1] = passToCheck
     */
    require(__DIR__.'/postConn.php');
    $obj = json_decode(file_get_contents('php://input'));
    var_dump($obj);
    $getSalt = $conn->prepare("SELECT salt, PASSHASH FROM UserAuthData WHERE authToken = ?");
    $getSalt->execute(array($_COOKIE["auth"]));
    $saltResult =  $getSalt->fetch(PDO::FETCH_OBJ);
    if(hash("SHA512", $obj[1].$saltResult->salt) == $saltResult->PASSHASH){
        $statement = $conn->prepare("UPDATE UserAuthData SET PASSHASH = ? WHERE authToken = ?");
        $statement->execute(array(hash("SHA512", $obj[0].$saltResult->salt), $_COOKIE["auth"]));
        require(__DIR__.'/../auth/refreshAuthToken.php');
        echo $authJSON;
    }else{
        echo json_encode(array('failed' => '1'));
    }
?>