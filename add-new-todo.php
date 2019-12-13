<?php include 'config.php';

if(isset($_POST["submit-btn"])) {
    $todo_value = $_POST["new-todo"];
    $query = $conn->query("INSERT INTO todo_list (todo_text) values ('$todo_value')");
    if ($query) {
        header('Location: /');
        die();
    }
}
