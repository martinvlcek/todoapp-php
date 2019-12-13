<?php

    $db_dns = 'mysql:host=localhost:3306;dbname=todoapp';
    $db_user = 'root';
    $db_pass = 'root';

    try {
        $conn = new PDO($db_dns, $db_user, $db_pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        die('Connection failed: ' . $e->getMessage());
    }

?>