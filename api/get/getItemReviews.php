<?php
    require(__DIR__.'/getReviewConn.php');

    $statement = $conn->prepare("SELECT * FROM ItemReviews WHERE id = ? LIMIT 5 [offset ?]");
    $statement->execute(array($_GET["id"], $_GET["offset"]));

    $data = $statement->fetchAll();
    require(__DIR__.'/parseOutput.php');
    echo $response;
    
?>