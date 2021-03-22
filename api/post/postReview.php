<?php

    require(__DIR__.'/postConn.php');
    $getUser = $conn->prepare('SELECT USER_NAME FROM () WHERE authToken = ?');
    $getUser->execute(array($_COOKIE["auth"]));
    $userName = $getUser->fetch(PDO::FETCH_OBJ);

    require(__DIR__.'/postReviewConn.php');
    $obj = json_decode(file_get_contents('php://input'));

    $statement = $conn->prepare('INSERT INTO ItemReviews VALUES(?,?,?,?, curdate())');
    if($statement->execute(array($userName->USER_NAME, $obj[0], $obj[1], $obj[2]))){
        echo json_encode(array("success" => "1"));
   }
?>