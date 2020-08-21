<?php
include("db.php");

//Si existe el id obtenida en el form
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id = $id";
    $result = mysqli_query($conn, $query);

    //mysqli_num_rows comprueba cuantas filas tiene el resultado
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $description = $row['description'];
    }
}

//Comprobación para mostrar el mensaje de actualizado
if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "UPDATE task SET title='$title', description='$description' WHERE id=$id";
    mysqli_query($conn, $query);

    $_SESSION['message'] = 'Task updated successfully';
    $_SESSION['message_type'] = 'warning';
    header("Location: index.php");
}

?>

<?php include('includes/header.php'); ?>

<!-- código html visual para la edición de un task -->
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit_task.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" value="<?php echo $title; ?>" class="form-control" placeholder="Update title">
                    </div>
                    <div class="form-group">
                        <input name="description" rows="2" class="form-control" placeholder="Update description" value="<?php echo $description; ?>">
                    </div>
                    <button class="btn btn-success" name="update">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
