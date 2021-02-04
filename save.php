<?php
include'db.php';
if(isset($_POST['save'])){
    $tittle=$_POST['tittle'];
    $description=$_POST['description'];
    
    $query = "INSERT INTO task(tittle, description) VALUES ('$tittle', '$description')";
    $result = mysqli_query($connection, $query);
    if (!$result){
        die("Query Faild");
    } else {
        $_SESSION['message'] = 'Tarea Guardada!';
        $_SESSION['message_type'] = 'success'; 
        header("Location:index.php");
    }
        
}
?>