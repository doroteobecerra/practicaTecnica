<?php
    
    class Departamento {

        public function getDepartamentos() {
            require_once "connection/Connection.php";
            // $db = new Connection();
            $query = "SELECT id, name_depto FROM departamentos";
            $resultado = $db->query($query);
            $datos = [];
            if($resultado->num_rows) {
                while ($row = $resultado->fetch_assoc()) {
                    $datos[] = [
                        'id' => $row['id'],
                        'nombre' => $row['name_depto'],
                    ];
                }//end while
            }//end if
            return $datos;
        }

    }