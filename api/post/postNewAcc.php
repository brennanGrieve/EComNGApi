<?php
    require(__DIR__.'/postConn.php');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
    $obj = json_decode(file_get_contents('php://input'));
    $salt = random_bytes(512);
    $statement = $conn->prepare('INSERT INTO UserAuthData VALUES(?, ?, ?, ?, ?, ? ,?, ?, 0)');
    $statement->execute(array($obj->user, hash("sha512", $obj->pass.$salt), $obj->email, $obj->fName, $obj->lName, $obj->shipAddr, $obj->phNum, $salt));
    $user = $obj->user;
    require(__DIR__.'/../auth/refreshAuthToken.php');
    echo $authJSON;
?>