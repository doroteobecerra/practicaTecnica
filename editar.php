<?php
    //require "departamentos.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/app.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <title>Coppel</title>
    </head>
    <body>
    <?php require_once "nav.php"; ?>
    <h3 class="text-center">Cambiar un Artículo</h3>
        <?php
            if(isset($_POST['actualizar'])){
                $id=$_POST['id'];
                $sku = $_POST['sku'];
                $articulo = $_POST['articulo'];
                $marca = $_POST['marca'];
                $modelo = $_POST['modelo'];
                $familias = $_POST['familias'];
                $alta = $_POST['alta'];
                $stock = $_POST['stock'];
                $cantidad = $_POST['cantidad'];
                $descontinuado = $_POST['descontinuado'];
                $baja = $_POST['baja'];

            
                require "connection/Connection.php";

                $sql = "UPDATE articulos SET articulo = '".$articulo."', marca = '".$marca."', 
                    modelo = '".$modelo."', familia_id = '".$familias."', cantidad = '".$cantidad."',
                    stock = '".$stock."', descontinuado = '".$descontinuado."', f_baja = '".$baja."' WHERE id_articulo = '".$id."'" ;

                $resultado = mysqli_query($db, $sql);
                if($resultado){
                    echo "<script language='JavaScript'>
                    alert ('No existe el SKU recibido, Registra un producto');
                    </script>";
                    header("Location: tabla.php");
                }else{
                    echo "<div class='alert alert-danger' role='alert'>
                    Ocurrio un error al actualizar los datos.
                    </div>";
                }
                mysqli_close($db);
                /* 
                Se permiten editar los solamente los siguientes campos:

                articulo , marca modelo, departamento, clase, familia,
                cantidad, stock, descontinuado 

                por lo tanto ocultamos el resto de los campos para que no puedan ser modificados.
                */

            }else{
                require_once "connection/Connection.php";

                $id = $_GET['id'];
                $sql = "SELECT * FROM articulos 
                LEFT JOIN familias ON familias.id = articulos.familia_id 
                LEFT JOIN clases ON clases.id = familias.clase_id 
                LEFT JOIN departamentos ON departamentos.id = clases.depto_id
                WHERE id_articulo = '".$id."'";
                $resultado = mysqli_query($db, $sql);
                $fila =  mysqli_fetch_assoc($resultado);

                $id = $fila['id_articulo'];
                $sku = $fila['sku'];
                $articulo = $fila['articulo'];
                $marca = $fila['marca'];
                $modelo = $fila['modelo'];
                $nameFamilia = $fila['name_familia'];
                $idFamilia = $fila['familia_id'];
                $nameClase = $fila['name_clase'];
                $idClase = $fila['clase_id'];
                $nameDepto = $fila['name_depto'];
                $idDepto = $fila['depto_id'];
                $stock = $fila['stock'];
                $cantidad = $fila['cantidad'];
                $alta = $fila['f_alta'];
                $negativo = $fila['descontinuado'];
                $positivo = $fila['descontinuado'];
                $baja = $fila['f_baja']; 

                mysqli_close($db);
            
        ?>
        <div class="container col-md-7">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                <div class="mb-2">
                    <!-- <label for="sku" class="">SKU:</label> -->
                    <input type="hidden" id="sku" name="sku" value="<?php echo $sku; ?>" minlength="6" maxlength="6" class="form-control" placeholder="090909">
                </div>
                <!-- checkbox descontinuado -->
                <div class="form-check mb-2">
                    <input type="hidden" name="descontinuado" value="0">
                    <?php
                    if($fila['descontinuado'] == 1){
                        echo '<input type="checkbox" class="form-check-input" name="descontinuado" id="descontinuado" checked="" value="'.$positivo.'">';
                    }else{
                        echo '<input type="checkbox" class="form-check-input" name="descontinuado" id="descontinuado" value="'.$negativo.'">';
                    }
                    ?>
                    
                    <label class="labelCheck" for="descontinuado">Descontinuado</label>
                </div>
                <div class="mb-2">
                    <label for="articulo" class="">Artículo:</label>
                    <input type="text" id="articulo" name="articulo" value="<?php echo $articulo; ?>" maxlength="15" class="form-control" placeholder="MacBook Air" required>
                </div>
                <div class="mb-2">
                    <label for="marca" class="">Marca:</label>
                    <input type="text" id="marca" value="<?php echo $marca; ?>" name="marca" class="form-control" maxlength="15" placeholder="Apple" required>
                </div>
                <div class="mb-2">
                    <label for="Modelo" class="">Modelo:</label>
                    <input type="text" id="modelo" name="modelo" value="<?php echo $modelo; ?>" class="form-control" maxlength="20" placeholder="FJGEID90" required>
                </div>
                <!-- select departamentos -->
                <div class="mb-2">
                    <label for="departamentos">Departamentos:</label>
                    <select id="departamentosEdit" name="departamentos" class="form-select" required>
                    <option value="<?php echo $idDepto; ?>"><?php echo $nameDepto; ?></option>
                        <?php
                        include_once "connection/connection.php";
                            
                        $sql = "SELECT * FROM departamentos";
                        $ejecutar = mysqli_query($db, $sql) or die (mysqli_error($db))
                        ?>

                        <?php foreach ($ejecutar as $opciones) : ?>

                        <option value="<?php echo $opciones['id'] ?>"><?php echo $opciones['name_depto'] ?></option>

                        <?php endforeach ?>
                    </select>
                </div>
                <!-- select clases -->
                <div class="mb-2">
                    <label for="clasesEdit">Clases:</label>
                    <select id="clasesEdit" name="clases" class="form-select" required>
                    <option value="<?php echo $idClase; ?>"><?php echo $nameClase; ?></option>
                    </select>
                </div>
                <!-- slelect familia -->
                <div class="mb-2">
                    <label for="familiasEdit">Familias:</label>
                    <select id="familiasEdit" name="familias" class="form-select" required>
                        <option value="<?php echo $idFamilia; ?>"><?php echo $nameFamilia; ?></option>
                    </select>
                </div>
                <div class="mb-2">
                    <label for="stock" class="">Stock:</label>
                    <input type="text" id="stock" value="<?php echo $stock; ?>" name="stock" class="form-control" maxlength="9" placeholder="123456789" required>
                </div>
                <div class="mb-2">
                    <label for="cantidad" class="">Cantidad:</label>
                    <input type="text" id="cantidad"value="<?php echo $cantidad; ?>" name="cantidad" class="form-control" maxlength="9" placeholder="123456789" required>
                </div>
                <div class="mb-2">
                    <!-- <label for="altaEdit" class="">Fecha alta:</label> -->
                    <input type="hidden" id="altaEdit" value="<?php echo $alta; ?>" name="alta" class="form-control" required>
                </div>
                <div class="mb-2">
                    <!-- <label for="bajaEdit" class="">Fecha baja:</label> -->
                    <input type="hidden" id="bajaEdit" value="<?php echo $baja; ?>" name="baja" class="form-control">
                </div>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="actualizar" id="guardar" class="btn btn-warning" value="Actualizar">
            </form>
        </div>
          <?php } ?>
        <script src="js/edit.js"></script>
    </body>
</html> 