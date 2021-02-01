<?php
    require(__DIR__.'/postConn.php');

    $obj = json_decode(file_get_contents('php://input'));
    $newUserName = $obj->user;
    $newPass = $obj->pass;
    $newEmail = $obj->email;
    $newShippingAddress = $obj->address;
    
    $statement = $conn->prepare('INSERT INTO Redacted VALUES(?, ?, ?, ?)');
    $statement->execute(array($newUserName, $newPass, $newEmail, $newShippingAddress));

?>