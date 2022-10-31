<?php

    ini_set('display_errors', 0);
    require "departamentos.php";
    $sku = $_GET['id'];
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <title>Coppel</title>
    </head>
    <body>
    <?php require_once "nav.php"; ?>
        <div class="container">
            <h3 class="text-center">Ingresar un Artículo</h3>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                <div class="mb-2">
                    <label for="sku" class="form-label">SKU:</label>
                    <input type="text" value="<?php echo $sku; ?>" id="sku" name="sku" minlength="6" maxlength="6" class="form-control">
                </div>
                <!-- checkbox descontinuado -->
                <div class="contenedor-check">
                    <!-- <input type="hidden" name="descontinuado" value="0"> -->
                    <input type="hidden" class="form-control" name="descontinuado" id="descontinuado" value="0">
                    <!-- <label class="labelCheck" for="descontinuado">Descontinuado</label> -->
                </div>
                <div class="mb-2">
                    <label for="articulo" class="form-label">Artículo:</label>
                    <input type="text" id="articulo" name="articulo" maxlength="15" class="form-control" placeholder="Refrigerador" required>
                </div>
                <div class="mb-2">
                    <label for="marca" class="">Marca:</label>
                    <input type="text" id="marca" name="marca" class="form-control" maxlength="15" placeholder="Samsung" required>
                </div>
                <div class="mb-2">
                    <label for="Modelo" class="">Modelo:</label>
                    <input type="text" id="Modelo" name="modelo" class="form-control" maxlength="20" placeholder="FJGEID90" required>
                </div>
                <!-- select departamentos -->
                <div class="mb-2">
                    <label for="departamentos">Departamentos:</label>
                    <select id="departamentos" name="departamentos" class="form-select" required>
                        <option value="">Seleccionar departamento</option>
                        <?php
                            foreach ($departamentos as $departamento) {
                                echo '<option value="'.$departamento['id'].'">'.$departamento['nombre'].'</option>';
                            }
                        ?>
                    </select>
                </div>
                <!-- select clases -->
                <div class="mb-2">
                    <label for="clases">Clases:</label>
                    <select id="clases" name="clases" class="form-select" required>
                        <option value="">Seleccionar clases</option>
                    </select>
                </div>
                <!-- slelect familia -->
                <div class="mb-2">
                    <label for="familias">Familias:</label>
                    <select id="familias" name="familias" class="form-select" required>
                        <option value="">Seleccionar una familia</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label for="stock" class="">Stock:</label>
                    <input type="text" id="stock" name="stock" class="form-control" maxlength="9" placeholder="123456789" required>
                </div>
                <div class="mb-2">
                    <label for="cantidad" class="">Cantidad:</label>
                    <input type="text" id="cantidad" name="cantidad" class="form-control" maxlength="9" placeholder="123456789" required>
                </div>
                <div class="">
                    <!-- <label for="alta" class="">Fecha alta:</label> -->
                    <input type="hidden" id="alta" name="alta" class="" required>
                </div>
                <div class="mb-2">
                    <!-- <label for="baja" class="">Fecha baja:</label> -->
                    <input type="hidden" id="baja" name="baja" value="1900-01-01" class="">
                </div>
                <!-- PHP para ingresar los datos del formulario a la bd -->
                <?php require_once "envioForm.php" ?>
                <input type="submit" name="guardar" id="guardar" class="btn btn-warning" value="Guardar">
            </form>
        </div>
        <script src="js/app.js"></script>
    </body>
</html> 