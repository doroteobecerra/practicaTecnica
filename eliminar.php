<?php
    $id = $_GET['id'];
    require_once "connection/Connection.php";

    $sql = "DELETE FROM articulos WHERE id_articulo = '".$id."'";
    $resultado = mysqli_query($db, $sql);

    header("Location:tabla.php");
    

?>