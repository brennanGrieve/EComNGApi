<?php
    require(__DIR__.'/getUserAccessConn.php');
    $statement = $conn->prepare("SELECT redacted FROM redacted WHERE redacted = ?");
    $statement->execute(array($_GET["email"]));
    $data = $statement->fetchAll();
    require(__DIR__.'/parseOutput.php');
    echo $response;
?>