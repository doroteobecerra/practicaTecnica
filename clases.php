<?php
    require_once "models/clase.php";
    $clases = [];
    if(isset($_GET['id_depto'])) {
        $tablaClases = new Clase();
        $clases = $tablaClases->getClases($_GET['id_depto']);
    }//end if
    echo json_encode(['data' => $clases]);
