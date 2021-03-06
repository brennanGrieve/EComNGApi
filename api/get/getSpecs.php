<?php
    require(__DIR__.'/getConn.php');
    $statement = $conn->prepare('SELECT * FROM ItemSpecs WHERE id = ?');
    $statement->execute(array($_GET["id"]));
    $data = $statement->fetchAll();
    require(__DIR__.'/parseOutput.php');
    echo $response;
?>