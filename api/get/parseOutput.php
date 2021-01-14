<?php

    $json;
    $i = 0;
    foreach($data as $row){
        $json[$i] = $row;
        $i++;
    }

    $response = json_encode($json);
?>