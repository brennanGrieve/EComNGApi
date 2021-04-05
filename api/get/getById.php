<?php
    require(__DIR__.'/getConn.php');
    $toGrab = $_GET["id"];

    if($incBool = isset($_GET["inc"])){
        $increment = $conn->prepare('UPDATE Stock SET views = views + 1 WHERE id = ?');
        $increment->execute(array($toGrab));
    }
    $statement = $conn->prepare('SELECT Stock.id, name, price, stockLevel, shortDesc, longDesc, avg(score) FROM Stock INNER JOIN ItemReviews ON Stock.id = ItemReviews.id WHERE Stock.id = ?
    ');
    $statement->execute(array($toGrab));
    $data = $statement->fetchAll();
    
    require(__DIR__.'/parseOutput.php');
    
    echo $response;

?>