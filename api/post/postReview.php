<?php

    require(__DIR__.'/postConn.php');
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    
    $getUser = $conn->prepare('SELECT USER_NAME FROM UAuthData WHERE authToken = ?');
    $getUser->execute(array($_COOKIE["auth"]));
    $userName = $getUser->fetch(PDO::FETCH_OBJ);
    var_dump($userName);

    require(__DIR__.'/postReviewConn.php');
    $obj = json_decode(file_get_contents('php://input'));

    $statement = $conn->prepare('INSERT INTO ItemReviews VALUES(?,?,?,?, curdate())');
    //$statement->execute(array($userName->USER_NAME, $obj[0], $obj[1], $obj[2]));
?>