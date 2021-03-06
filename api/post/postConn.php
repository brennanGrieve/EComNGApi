<?php
    require(__DIR__.'/../../config/config.php');
    $target = 'mysql:host=localhost;dbname='.$userDB.';';
    $conn = new PDO($target, $postUser, $postPass);
?>