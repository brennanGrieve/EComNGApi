<?php
    require(__DIR__.'/postConn.php');
    $statement = $conn->prepare('SELECT var_list_redacted FROM redacted WHERE redacted = ?');
    $statement->execute(array($_COOKIE["auth"]));
    $data = json_encode($statement->fetch(PDO::FETCH_OBJ));
    echo $data;
?>