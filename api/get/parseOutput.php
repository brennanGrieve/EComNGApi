<?php

    $json;
    $i = 0;
    foreach($data as $row){
        $json[$i] = $row;
        $i++;
    }
    if($json == null){
        $empty = true;
        $json[0] = $error;
    }
    $response = json_encode($json);
?>