<?php

    class Familia {

        public function getFamilias($id_clase) {
            require_once "connection/Connection.php";
            $query = "SELECT id, name_familia FROM familias WHERE clase_id = $id_clase";
            $resultado = $db->query($query);
            $datos = [];
            if($resultado->num_rows) {
                while ($row = $resultado->fetch_assoc()) {
                    $datos[] = [
                        'id' => $row['id'],
                        'nombre' => $row['name_familia'],
                    ];
                }
            }
            return $datos;
        }

    }