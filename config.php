<?php

$db_host = '127.0.0.1';
$db_user = 'root';
$db_pass = 'root';
$db_name = 'todoapp';
$db_port = '3306';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name, $db_port);

if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

?>