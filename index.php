<?php include '_header.php' ?>
<?php include 'config.php' ?>

<?php

    $query = $conn->query('SELECT * FROM todo_list');
    $all_todos = $query->fetchAll();

?>

    <div class="jumbotron jumbotron-fluid py-4">
        <div class="container">
            <h1 class="display-4">Todo App</h1>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6 order-1 order-md-0 mt-4 mt-md-0 todo-list">
                <ul class="list-group">
                    <?php foreach ($all_todos as $todo) : ?>
                        <li class="list-group-item"><?= $todo['todo_text'] ?>
                            <a href="edit-todo.php?id=<?= $todo['id'] ?>"><i class="fas fa-edit"></i></a>
                            <a href=""><i class="fas fa-trash-alt"></i></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="col-md-6 order-0 order-md-1 input-new-todo">
                <form action="add-new-todo.php" method="post">
                    <div class="form-group">
                        <textarea class="form-control" name="new-todo" rows="4" placeholder="Write your new todo..."></textarea>
                    </div>
                    <input type="submit" class="btn btn-primary" name="submit-btn" value="Pridat">
                </form>
            </div>
        </div>
    </div>

<?php include '_footer.php' ?>