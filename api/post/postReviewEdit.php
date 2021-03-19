<?php
     require(__DIR__.'/postConn.php');
     $getUser = $conn->prepare('SELECT USER_NAME FROM () WHERE authToken = ?');
     $getUser->execute(array($_COOKIE["auth"]));
     $userName = $getUser->fetch(PDO::FETCH_OBJ);
 
     require(__DIR__.'/postReviewConn.php');
     $obj = json_decode(file_get_contents('php://input'));
     $statement = $conn->prepare("UPDATE ItemReviews SET score = ?, comment = ? WHERE id = ? && USER_NAME = ?");
     $statement->execute(array($obj[1], $obj[2], $obj[0], $username->USER_NAME));
?>