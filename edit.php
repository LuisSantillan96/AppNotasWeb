<?php
include 'db.php';

if(isset($_GET{'id'})){
    $id=$_GET['id'];
    $result = $query = "SELECT * FROM task WHERE id=$id";
    $result = mysqli_query($connection,$query);
    if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_array($result);
        $tittle = $row['tittle'];
        $description = $row['description'];
    }
}

if(isset($_POST['update'])){
    $id=$_GET['id'];
    $tittle=$_POST['tittle'];
    $description=$_POST['description'];

   $query = "UPDATE task set tittle = '$tittle', description = '$description' WHERE id = $id";
    mysqli_query($connection, $query);
    $_SESSION['message'] = 'La tarea se ha actualizado!';
    $_SESSION['message_type'] = 'warning';
    header("Location:index.php");
}

?>

<?php include 'includes/header.php' ?>

<div class="container p-4">
    <div class=row>
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form class="text-center" action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <h5 class="text-center">Actualizar Tarea</h5>
                        <hr>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="tittle" value="<?php echo $tittle; ?>">
                        <br>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="description" id="" cols="" rows="2" ><?php echo $description; ?></textarea>
                        <br>                    
                    </div>
                    <button class="btn btn-primary" name="update">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>