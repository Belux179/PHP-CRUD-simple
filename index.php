<?php
include('db.php');
include('includes/header.php');
?>


<div class="container pt-4">
    <div class="row">
        <div class="col-md-5">
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?php echo $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong><?php echo $_SESSION['message']; ?></strong>
                </div>

                <script>
                    var alertList = document.querySelectorAll('.alert');
                    alertList.forEach(function(alert) {
                        new bootstrap.Alert(alert)
                    })
                </script>

            <?php session_unset();
            } ?>
            <div class="card">
                <div class="card-header">
                    prueba
                </div>
                <div class="card-body">
                    <form action="save_task.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                        </div>
                        <div class="form-group pb-4">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" row="2" class="form-control" placeholder="description"></textarea>
                        </div>
                        <button type="submit" name="save_task" class="btn btn-primary">Save Task</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-7 overflow-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = 'SELECT * FROM task;';
                    $table = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($table)){ 
                    ?>
                        <tr>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['created_at']; ?></td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>

        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>