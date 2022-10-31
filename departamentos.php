<?php
    require_once "models/departamento.php";
    $tablaDepartamento = new Departamento();
    $departamentos = $tablaDepartamento->getDepartamentos(); 