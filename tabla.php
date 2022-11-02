<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coppel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
<?php require_once "nav.php"; ?>
    <h2 class="text-center">Lista de artículos</h2>
    <div class="col-md-4 mb-3 mx-auto">
        <form class="d-flex md-4" role="search" method="POST">
            <input class="form-control me-2" name="search" type="search" placeholder="Buscar" aria-label="Search">
            <input class="btn btn-outline-success" name="enviar" type="submit" value="Buscar">
        </form>
    </div>
    <?php

    $where='';
     include_once "connection/Connection.php";

        if(isset($_POST['enviar'])){
            $search = $_POST['search'];

            if(isset($_POST['search'])){
                $where = "WHERE articulos.sku LIKE '%".$search."%'";
            }
        }
    include_once "connection/Connection.php";
    if(isset($_POST['enviar'])){
        $search = $_POST['search'];

        $sql= "SELECT * FROM articulos WHERE sku LIKE '%".$search."%'";
        $resultado = mysqli_query($db,$sql);


    }
    ?>

    <?php
        include_once "connection/Connection.php";
        $sql = "SELECT * FROM articulos
        INNER JOIN familias ON familias.id = articulos.familia_id 
        INNER JOIN clases ON clases.id = familias.clase_id 
        INNER JOIN departamentos ON departamentos.id = clases.depto_id $where ORDER BY id_articulo DESC";
        
        $resultado = mysqli_query($db, $sql);

    ?>

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>SKU</th>
                <th>Artículo</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Departamento</th>
                <th>Clase</th>
                <th>Familia</th>
                <th>Fecha alta</th>
                <th>Stock</th>
                <th>Cantidad</th>
                <th>Descon.</th>
                <th>Fecha baja</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($filas = mysqli_fetch_assoc($resultado)){
            ?>
            <tr>
                <td scope="row"><?php echo $filas['sku']?></td>
                <td><?php echo $filas['articulo']?></td>
                <td><?php echo $filas['marca']?></td>
                <td><?php echo $filas['modelo']?></td>
                <td><?php echo $filas['name_depto']?></td>
                <td><?php echo $filas['name_clase']?></td>
                <td><?php echo $filas['name_familia']?></td>
                <td><?php echo $filas['f_alta']?></td>
                <td><?php echo $filas['stock']?></td>
                <td><?php echo $filas['cantidad']?></td>
                <td><?php echo $filas['descontinuado']?></td>
                <td><?php echo $filas['f_baja']?></td>
                <td>
                    <?php echo "<a class='btn btn-primary' href='editar.php?id=".$filas['id_articulo']."'>
                        <svg class='btnEdit' xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-edit' width='32' height='32' viewBox='0 0 24 24' stroke-width='1.5' stroke='#fff' fill='none' stroke-linecap='round' stroke-linejoin='round'>
                        <path stroke='none' d='M0 0h24v24H0z' fill='none'/>
                        <path d='M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3' />
                        <path d='M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3' />
                        <line x1='16' y1='5' x2='19' y2='8' />
                        </svg> 
                    </a>"; ?>
                    <?php echo "<a class='btn btn-danger' onclick='return confirmacion()' href='eliminar.php?id=".$filas['id_articulo']."'>
                        <svg class='btnDelete' xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-trash' width='32' height='32' viewBox='0 0 24 24' stroke-width='1.5' stroke='#fff' fill='none' stroke-linecap='round' stroke-linejoin='round'>
                        <path stroke='none' d='M0 0h24v24H0z' fill='none'/>
                        <line x1='4' y1='7' x2='20' y2='7' />
                        <line x1='10' y1='11' x2='10' y2='17' />
                        <line x1='14' y1='11' x2='14' y2='17' />
                        <path d='M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12' />
                        <path d='M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3' />
                        </svg>
                    </a>"; ?>
                </td>
            </tr>
            <?php } ?> 
        </tbody>
    </table>
    <script>
        function confirmacion(){
            let mensaje = confirm("¿Realmente desea eliminar el mensaje?")
            if(mensaje == true ){
                return true
            }{
                return false
            }
        }
    </script>
</body>
</html>