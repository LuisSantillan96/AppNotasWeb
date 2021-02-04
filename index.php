<?php include 'db.php'; ?>
<?php include 'includes/header.php'; ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
    
            <?php if(isset($_SESSION['message'])){ ?>
                <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset(); } ?>

            <div class="card card-body text-center">
                <form action="save.php" method="POST">
                    <div class="form-group">
                        <h5 class="text-center">Nueva Nota</h5>
                        <hr>
                    </div>
                    <div class="form-group">
                        <input type="text" name="tittle" class="form-control" placeholder="Cual es el titulo">
                    </div>
                    <br>
                    <div class="form-group">
                        <textarea name="description" id="" cols="" rows="2" class="form-control" placeholder="Describe la tarea"></textarea>
                    </div>
                    <br>
                    <input type="submit" name="save" class="btn btn-success btn-block" value="Guardar Tarea">
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Fecha de Creacion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        $query = "SELECT * FROM task";
                        $result_tasks = mysqli_query($connection, $query);

                        while($row = mysqli_fetch_array($result_tasks)){ ?>
                            <tr>
                                <td><?php echo $row['tittle']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td><?php echo $row['created_at']; ?></td>
                                <td>
                                    <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'includes/footer.php' ?>
