<?php
    class Clase {

        public function getClases($id_depto) {
            require_once "connection/Connection.php";
            // $db = new Connection();
            $query = "SELECT id, name_clase FROM clases WHERE depto_id = $id_depto";
            $resultado = $db->query($query);
            $datos = [];
            if($resultado->num_rows) {
                while ($row = $resultado->fetch_assoc()) {
                    $datos[] = [
                        'id' => $row['id'],
                        'nombre' => $row['name_clase'],
                    ];
                }
            }
            return $datos;
        }

    }