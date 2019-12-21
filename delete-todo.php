<?php

    require 'config.php';
    include '_header.php';
    session_start();

    $id = $_GET['id'];
    // get todo item from DB with current ID
    $query_get = $conn->query("SELECT * FROM todo_list WHERE id = $id");
    $current_todo = $query_get->fetch();

    if (isset($_POST['delete-todo-btn'])) {
        // update new todo to DB with current ID
        $query_set = $conn->query("DELETE FROM todo_list WHERE id = $id");
        if ($query_set) {
            $_SESSION['message'] = 'Todo removed successfully!';
            header('Location: /');
            die();
        }
    }

    if (isset($_POST['back-btn'])) {
        header('Location: /');
        die();
    }
?>

    <div class="jumbotron jumbotron-fluid py-4">
        <div class="container">
            <h1 class="display-4">Delete Todo with ID #<?= $current_todo['id'] ?></h1>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6 order-0 order-md-1 input-delete-todo">
                <form action="delete-todo.php?id=<?= $current_todo['id']?>" method="post">
                    <div class="form-group">
                        <textarea class="form-control" name="deleted-todo" rows="4" disabled> <?= $current_todo['todo_text'] ?></textarea>
                    </div>
                    <input type="submit" class="btn btn-danger delete-todo" name="delete-todo-btn" value="Delete">
                    <input type="submit" class="btn btn-secondary" name="back-btn" value="Back">
                </form>
            </div>
        </div>
    </div>

<?php include '_footer.php'; ?>