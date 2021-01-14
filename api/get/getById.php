<?php
    require(__DIR__.'/getConn.php');
    $toGrab = $_GET["id"];

    $statement = $conn->prepare('SELECT * FROM Stock WHERE id = ?');
    $statement->execute(array($toGrab));
    $data = $statement->fetchAll();
    
    require(__DIR__.'/parseOutput.php');
    
    echo $response;

?>