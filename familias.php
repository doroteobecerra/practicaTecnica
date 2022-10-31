<?php
    require_once "models/familia.php";

    $familias = [];
    if(isset($_GET['id_clase'])) {
        $tablaFamilia = new Familia();
        $familias = $tablaFamilia->getFamilias($_GET['id_clase']);
    }//end if
    echo json_encode(['data' => $familias]);
