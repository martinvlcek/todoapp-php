<?php include '_header.php' ?>
<?php include 'config.php' ?>

    <div class="jumbotron jumbotron-fluid py-4">
        <div class="container">
            <h1 class="display-4">Todo App</h1>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6 order-1 order-md-0 mt-4 mt-md-0 todo-list">
                <ul class="list-group">
                    <li class="list-group-item">Cras justo odio</li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Morbi leo risus</li>
                    <li class="list-group-item">Porta ac consectetur ac</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                </ul>
            </div>

            <div class="col-md-6 order-0 order-md-1 input-new-todo">
                <form action="add-new-todo.php" method="post">
                    <div class="form-group">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="Write your new todo..."></textarea>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include '_footer.php' ?>