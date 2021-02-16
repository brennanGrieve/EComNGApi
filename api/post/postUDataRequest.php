<?php
    require(__DIR__.'/postConn.php');
    $obj = json_decode(file_get_contents('php://input'));
    $statement = $conn->prepare('SELECT var_list_redacted FROM redacted WHERE redacted = ?');
    $statement->execute(array($obj->token));
    $response = json_encode($statement->fetch(PDO::FETCH_OBJ));
?>