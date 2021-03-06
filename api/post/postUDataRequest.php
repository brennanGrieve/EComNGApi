<?php
    require(__DIR__.'/postConn.php');
    $statement = $conn->prepare('SELECT USER_NAME, EMAIL, F_NAME, L_NAME, SHIP_ADDR, PH_NUM FROM UserAuthData WHERE authToken = ?');
    $statement->execute(array($_COOKIE["auth"]));
    $data = json_encode($statement->fetch(PDO::FETCH_OBJ));
    echo $data;
?>