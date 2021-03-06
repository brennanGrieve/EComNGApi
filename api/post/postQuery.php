<?php   
    require(__DIR__.'/postConn.php');
	$obj = json_decode(file_get_contents('php://input'));	
    $statement = $conn->prepare('INSERT INTO UserQueries VALUES(DEFAULT,?,?,?)');
    $statement->execute(array($obj->name,$obj->email,$obj->query));
?>