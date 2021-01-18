<?php
    require(__DIR__.'/getConn.php');

    $searchTerms = $_GET["name"];
    $statement = $conn->prepare("SELECT * FROM Stock WHERE name = ?");
    $statement->exec(array($searchTerms));
    $data = $statement->fetchAll();

    require(__DIR__.'/parseOutput.php');

    echo $response;

?>