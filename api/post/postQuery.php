<?php   
    require(__DIR__.'/postConn.php');
	$obj = json_decode(file_get_contents('php://input'));	
	$name = $obj->name;
	$email = $obj->email;
	$query = $obj->query;

    $statement = $conn->prepare('INSERT INTO UserQueries VALUES(DEFAULT,?,?,?)');
    $statement->execute(array($name,$email,$query));
?>