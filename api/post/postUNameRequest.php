<?php
    require(__DIR__.'/postConn.php');

    $statement = $conn->prepare("SELECT USER_NAME FROM UserAuthData WHERE auth = ?");
    $statement->execute(array($_COOKIE["auth"]));
    
    $data = json_encode($statement->fetch(PDO::FETCH_OBJ));

    echo $data;

?>