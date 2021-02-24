<?php
    require(__DIR__.'/postConn.php');
    $obj = json_decode(file_get_contents('php://input'));
    $newEmail = $obj->newEmail;
    $statement = $conn->prepare("UPDATE UserAuthData SET EMAIL = ? WHERE authToken = ?");
    $statement->execute(array($newEmail, $_COOKIE["auth"]));
    //After initial implementation, take a look at sending a confirmation email and making a proper process of it.
?>