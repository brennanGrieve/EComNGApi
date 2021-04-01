<?php
    require(__DIR__.'/getConn.php');

    $statement = $conn->query(
        "SELECT Stock.id, name, price, stockLevel, shortDesc, longDesc, avg(score) AS avgScore 
        FROM Stock LEFT JOIN ItemReviews ON Stock.id = ItemReviews.id GROUP BY Stock.id 
        ORDER BY DateAdded DESC LIMIT 12
    ");

    $data = $statement->fetchAll();

    require(__DIR__.'/parseOutput.php');

    echo $response;
    ?>