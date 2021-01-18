<?php
    require(__DIR__.'/getConn.php');

    $searchTerms = $_GET["name"];
    $searchTerms = '%'.$searchTerms.'%';
    $statement = $conn->prepare("SELECT * FROM Stock WHERE name LIKE ?");
    $statement->execute(array($searchTerms));
    $data = $statement->fetchAll();

    require(__DIR__.'/parseOutput.php');

    echo $response;
?>