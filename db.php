<?php
// Config this sh**
$servername = '127.0.0.1';
$username = 'root';
$password = '123456';
$dbname = 'coff1e';

try {
    $conn = mysqli_connect($servername, $username, $password, $dbname);
} catch (\Throwable $th) {
    if (mysqli_connect_errno()) {
        printf("Error de conexión: %s\n", mysqli_connect_error());
        exit();
    }
}
?>