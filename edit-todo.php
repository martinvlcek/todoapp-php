<?php

    require 'config.php';
    include '_header.php';
    session_start();


    $id = $_GET['id'];
    // get todo item from DB with current ID
    $query_get = $conn->query("SELECT * FROM todo_list WHERE id = $id");
    $current_todo = $query_get->fetch();

    if (isset($_POST['edit-todo-btn'])) {
        // update new todo to DB with current ID
        $edited_todo = $_POST['edited-todo'];
        $query_set = $conn->query("UPDATE todo_list SET todo_text = '$edited_todo' WHERE id = $id");
        if ($query_set) {
            $_SESSION['message'] = 'Todo edited successfully!';
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
            <h1 class="display-4">Edit Todo with ID #<?= $current_todo['id'] ?></h1>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6 order-0 order-md-1 input-edit-todo">
                <form action="edit-todo.php?id=<?= $current_todo['id']?>" id="edit-form" method="post">
                    <div class="form-group">
                        <textarea class="form-control" id="edit-todo" name="edited-todo" rows="4"><?= $current_todo['todo_text'] ?></textarea>
                    </div>
                    <input type="submit" class="btn btn-success edit-todo" name="edit-todo-btn" value="Edit">
                    <input type="submit" class="btn btn-secondary" name="back-btn" value="Back">
                </form>
            </div>
        </div>
    </div>

<?php include '_footer.php';