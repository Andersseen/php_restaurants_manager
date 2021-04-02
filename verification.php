<?php

if (isset($_SESSION['user_id'])) {
    // $records_admin = $conn->prepare('SELECT id, username, is_admin FROM users WHERE id = :id AND is_admin = 1');
    // $records_admin->bindParam(':id', $_SESSION['user_id']);
    // $records_admin->execute();
    // $results_admin = $records_admin->fetch(PDO::FETCH_ASSOC);


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