<?php
    require(__DIR__.'/postConn.php');
    $obj = json_decode(file_get_contents('php://input'));
    $statement = $conn->prepare("UPDATE UserAuthData SET SHIP_ADDR = ? WHERE authToken = ?");
    $statement->execute(array($obj->newAddr, $_COOKIE["auth"]));
?>