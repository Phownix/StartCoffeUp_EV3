<?php
include "./db.php";

if(strlen($_POST['id_rut']) <= 10){
    $stmt = $conn->prepare("INSERT INTO form (`firts_name`, `last_name`, `id_rut`, `type`, `descr`, `datr`) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('ssssss',$firts_name, $last_name, $id_rut, $typ, $desc, $datr);


    $firts_name = $_POST['firts_name'];
    $last_name = $_POST['last_name'];
    $id_rut = $_POST['id_rut'];
    $typ = $_POST['type'];
    $desc = $_POST['desc'];
    $datr = $_POST['date'];

    $stmt->execute();

    $conn->close();
}

header("Location: /");
die();
?>
