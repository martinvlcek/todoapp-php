<?php
    include 'config.php';

    $todo_value = $_POST["add-todo"];
    if(isset($todo_value)) {

        $query = $conn->query("INSERT INTO todo_list (todo_text) values ('$todo_value')");
        if ($query) {
//            header('Location: /');
            die('success');
        }
    }
?>