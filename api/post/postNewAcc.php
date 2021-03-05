<?php
    require(__DIR__.'/postConn.php');
    $obj = json_decode(file_get_contents('php://input'));
    $salt = random_bytes(512);
    $statement = $conn->prepare('INSERT INTO redacted VALUES(?, ?, ?, ?, ?, ? ,?, ?)');
    $statement->execute(array($obj->user, hash("sha512", $obj->pass.$salt), $obj->email, $obj->fName, $obj->lName, $obj->shipAddr, $obj->phNum, $salt));
    require(__DIR__.'/../auth/refreshAuthToken.php');
    echo $authJSON;
?>