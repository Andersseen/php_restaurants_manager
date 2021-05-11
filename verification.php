<?php

if (isset($_SESSION['user_id'])) {

    $records = $conn->prepare('SELECT id, username, id_role FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user_ses = null;


    if (count($results) > 0) {
        $user_ses = $results;
    } else {
        die();
    }
}