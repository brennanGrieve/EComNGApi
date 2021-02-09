<?php
    require(__DIR__.'/../../config/config.php');
    $target = "mysql:host=localhost;dbname=".$stockDB.";";

    $conn = new PDO($target, $getConnUser, $getConnPass);
    ?>