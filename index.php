<?php include '_header.php' ?>
<?php include 'config.php' ?>

<?php

    $query = $conn->query('SELECT * FROM todo_list');
    $all_todos = $query->fetchAll();

?>

    <div class="jumbotron jumbotron-fluid py-4">
        <div class="container">
            <h1 class="display-4"><a href="/">Todo App</a></h1>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6 order-1 order-md-0 mt-4 mt-md-0 todo-list">
                <ul class="list-group">
                    <?php foreach ($all_todos as $todo) : ?>
                        <li class="list-group-item"><?= $todo['todo_text'] ?>
                            <div class="d-block text-right">
                                <a href="edit-todo.php?id=<?= $todo['id'] ?>"><i class="text-success fas fa-edit"></i></a>
                                <a href="delete-todo.php?id=<?= $todo['id'] ?>"><i class="text-danger fas fa-trash-alt"></i></a>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="col-md-6 order-0 order-md-1 input-new-todo">
                <form action="add-todo.php" method="post" id="main-form">
                    <div class="form-group">
                        <textarea class="form-control" id="add-new-todo" name="add-todo" rows="4" placeholder="Write your new todo..." autofocus></textarea>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include '_footer.php' ?>