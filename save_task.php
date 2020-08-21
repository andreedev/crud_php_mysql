<?php

include("db.php");

/*Si existe a través del método POST un valor llamado save_task */
if (isset($_POST['save_task'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    //consulta
    $query = "INSERT INTO task(title, description) VALUES ('$title', '$description')";
    //mysqli_query(conexión, consulta)
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query failed");
    } 

    //almacena dentro de la sesión un mensaje y su tipo
    $_SESSION['message'] = 'Task saved succesfully';
    $_SESSION['message_type'] = 'success';

    //redireccionar
    header("Location: index.php");
}