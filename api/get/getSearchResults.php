<?php
    require(__DIR__.'/getConn.php');

    $searchTerms = $_GET["name"];
    $searchTerms = '%'.$searchTerms.'%';
    $statement = $conn->prepare(
        "SELECT Stock.id, name, price, stockLevel, shortDesc, longDesc, avg(score) AS avgScore 
        FROM Stock LEFT JOIN ItemReviews ON Stock.id = ItemReviews.id WHERE name LIKE ? GROUP BY Stock.id
    ");
    $statement->execute(array($searchTerms));
    $data = $statement->fetchAll();

    require(__DIR__.'/parseOutput.php');

    echo $response;
?>