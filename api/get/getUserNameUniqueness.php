<?php
    require(__DIR__.'/getUserAccessConn.php');
    $statement = $conn->prepare("SELECT USER_NAME FROM UserAuthData WHERE USER_NAME = ?");
    $statement->execute(array($_GET["name"]));
    $data = $statement->fetchAll();
    require(__DIR__.'/parseOutput.php');
    echo $response;
?>