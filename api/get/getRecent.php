<?php
error_reporting(E_ALL);
    require(__DIR__.'/getConn.php');

    $data = $conn->query("SELECT * FROM Stock ORDER BY DateAdded LIMIT 12");

    $rows = $data->fetchAll();

    $json;
    $i = 0;
    foreach($rows as $row){
        $json[$i] = $row;
        $i++;
    }

    $response = json_encode($json);

    echo $response;
    ?>