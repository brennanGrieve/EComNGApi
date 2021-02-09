<?php
    require(__DIR__.'/postConn.php');
    $obj = json_decode(file_get_contents('php://input'));
    $newUserName = $obj->user;
    $newPass = $obj->pass;
    $newEmail = $obj->email;
    $newShipAddr = $obj->shipAddr;
    $newFName = $obj->fName;
    $newLName = $obj->lName;
    $newPhNum = $obj->phNum;
    $salt = random_bytes(512);
    $saltedPass = $newPass.$salt;
    $hashedPass = hash("sha512", $newPass.$salt);

    $statement = $conn->prepare('INSERT INTO redacted VALUES(?, ?, ?, ?, ?, ? ,?, ?)');
    $statement->execute(array($newUserName, $hashedPass, $newEmail, $newFName, $newLName, $newShipAddr, $newPhNum, $salt));
?>