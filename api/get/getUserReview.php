<?php
    require(__DIR__.'/getUserAccessConn.php');

    $getUser = $conn->prepare('SELECT USER_NAME FROM UserAuthData WHERE authToken = ?');
    $getUser->execute(array($_COOKIE["auth"]));
    $userName = $getUser->fetch(PDO::FETCH_OBJ);


    require(__DIR__.'/getReviewConn.php');

    $statement = $conn->prepare('SELECT score, comment FROM ItemReviews WHERE USER_NAME = ? && id = ?');
    $statement->execute(array($userName->USER_NAME, $_GET["id"]));
    $result = $statement->fetchall(PDO::FETCH_OBJ);


    echo json_encode($result);

?>