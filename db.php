<?php

session_start();

//conexión a la base de datos SQL
$conn = mysqli_connect(
    'localhost:3308',
    'root',
    '',
    'php_mysql_crud'
);