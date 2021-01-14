<?php
error_reporting(E_ALL);
    require(__DIR__.'/getConn.php');
    $toGrab = $_GET["id"];

    $statement = $conn->prepare('SELECT * FROM ItemSpecs WHERE id = ?');
    $statement->execute(array($toGrab));
    $data = $statement->fetchAll();

    $json;
    $i = 0;
    foreach($data as $row){
        $json[$i] = $row;
        $i++;
    }

    $response = json_encode($json);
    echo $response;
?>