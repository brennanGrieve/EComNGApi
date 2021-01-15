<?php   
    require(__DIR__.'/postConn.php');

    $name = $_POST["name"];
    $email = $_POST["email"];
    $query = $_POST["query"];

    $statement = $conn->prepare('INSERT INTO UserQueries VALUES(?,?,?)');
    $statement->execute(array($name, $email, $query));
?>