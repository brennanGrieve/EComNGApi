<?php
    require(__DIR__.'/../../config/config.php');
    $target = 'mysql:host=localhost;dbname='.$reviewDB.';';

    $conn = new PDO($target, $reviewUser, $reviewPass);

?>