<?php
    require(__DIR__.'/getConn.php');

    $statement = $conn->query("SELECT * FROM Stock ORDER BY Views DESC LIMIT 8");

    $data = $statement->fetchAll();

    require(__DIR__.'/parseOutput.php');

    echo $response;

?>