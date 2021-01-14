<?php
error_reporting(E_ALL);
    require(__DIR__.'/getConn.php');
    $toGrab = $_GET["id"];

    $statement = $conn->prepare('SELECT * FROM ItemSpecs WHERE id = ?');
    $statement->execute(array($toGrab));
    $data = $statement->fetchAll();

    require(__DIR__.'/parseOutput.php');


    echo $response;
?>