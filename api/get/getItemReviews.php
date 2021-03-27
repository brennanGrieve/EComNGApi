<?php
    require(__DIR__.'/getReviewConn.php');

    $statement = $conn->prepare("SELECT * FROM ItemReviews WHERE id = :id LIMIT 5 OFFSET :offset");
    $statement->bindParam(':id', $_GET["id"], PDO::PARAM_INT);
    $statement->bindParam(':offset', $_GET["offset"], PDO::PARAM_INT);
    $statement->execute();
    $data = $statement->fetchAll(PDO::FETCH_OBJ);
    require(__DIR__.'/parseOutput.php');
    echo $response;
    

    
?>