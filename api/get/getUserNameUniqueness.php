<?php
    require(__DIR__.'/getUserAccessConn.php');
    $searchTerms = $_GET["name"];

    $statement = $conn->prepare("SELECT redacted FROM redacted WHERE user = ?");
    $statement->execute(array($searchTerms));
    $data = $statement->fetchAll();
    require(__DIR__.'/parseOutput.php');
    $response = json_encode($json);
?>