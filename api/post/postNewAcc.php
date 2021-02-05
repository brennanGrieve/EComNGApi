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
    
    $statement = $conn->prepare('INSERT INTO Redacted VALUES(?, ?, ?, ?)');
    $statement->execute(array($newUserName, $newPass, $newEmail, $newShippingAddress));
?>