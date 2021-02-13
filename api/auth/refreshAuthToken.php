<?php
    $newRandom = random_bytes(512);
    $newAuthToken = hash("sha512", $newRandom);
    $tokenStatement = $conn->prepare('UPDATE redacted SET redacted = ? WHERE redacted = ?');
    $tokenStatement->execute(array($newAuthToken, $user));
    $authJSON = json_encode($newAuthToken);
?>