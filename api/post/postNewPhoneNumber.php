<?php
    require(__DIR__.'/postConn.php');
    $obj = json_decode(file_get_contents('php://input'));
    $statement = $conn->prepare("UPDATE UserAuthData SET PH_NUM = ? WHERE authToken = ?");
    $statement->execute(array($obj->newNumber, $_COOKIE["auth"]));
?>