<?php
    require(__DIR__.'/getUserAccessConn.php');
    $getUser = $conn->prepare('SELECT USER_NAME FROM UserAuthData WHERE auth = ?');
    $getUser->execute(array($_COOKIE['auth']));
    $name = $getUser->fetchAll(PDO::FETCH_OBJ);


    require(__DIR__.'/getReviewConn.php');

    $statement = $conn->prepare('SELECT score, comment FROM ItemReviews WHERE USER_NAME = ?');
    $statement->execute(array($name["USER_NAME"]));
    $result = $statement->fetchall(PDO::OBJ);

    echo json_encode($result);

?>