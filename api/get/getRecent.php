<?php
    require(__DIR__.'/getConn.php');

    $statement = $conn->query("SELECT * FROM Stock ORDER BY DateAdded LIMIT 12");

    $data = $statement->fetchAll();

    require(__DIR__.'/parseOutput.php');

    echo $response;
    ?>