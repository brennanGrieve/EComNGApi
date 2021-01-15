<?php   
    require(__DIR__.'/postConn.php');

    if(isset($_POST["name"])){
	    $name = $_POST["name"];
    }else{
	    $invalid = true;
    }
    if(isset($_POST["email"])){
	    $email = $_POST["email"];
    }else{
	    $invalid = true;
    }
    if(isset($_POST["query"])){
	    $query = $_POST["query"];
    }else{
	    $invalid = true;
    }

    $statement = $conn->prepare('INSERT INTO UserQueries VALUES(DEFAULT,?,?,?)');
    if($invalid = false){$statement->execute(array($name,$email,$query));}
?>