<?php

	
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

    require(__DIR__.'/getConn.php');

    $statement = $conn->query("SELECT * FROM Stock ORDER BY DateAdded LIMIT 12");

    $data = $statement->fetchAll();

    require(__DIR__.'/parseOutput.php');

    echo $response;
    ?>