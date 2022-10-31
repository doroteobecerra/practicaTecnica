<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/app.css">
    <title>Coppel</title>
</head>
<body>
    <?php require_once "nav.php"; ?>

    <div class="container">
        <img class="logo" src="img/logo.jpeg" alt="logo-coppel">
        <form action="" method="POST">
            <p class="mt-4">Ingresa un SKU valido, debe ser un número con 6 caracteres </p>
            <label for="sku" class="form-label">Captura SKU:</label>
            <input type="text" id="sku" name="sku" minlength="6" maxlength="6" class="form-control" placeholder="090909">
            <input type="submit" class="btn btn-warning mt-3" name="buscar" value="Buscar">
        </form>
    </div>
    <?php
        //verificacion de si existe o no el sku registrado
        if(isset($_POST['buscar'])){
            $sku = $_POST['sku'];
            require_once "connection/connection.php";
            $sql = "SELECT * FROM articulos WHERE sku = $sku";
            $resultado = mysqli_query($db, $sql);
            if($resultado->num_rows > 0){
                header("Location: tabla.php");
            }else{
                echo "<script language='JavaScript'>
                alert ('No existe el SKU recibido, Registra un producto');
                </script>";
                header("Location: agregar.php?id=".$sku."");
                ?>
            
        <?php } ?>
       <?php } ?>
    <script src="js/app.js"></script>
</body>
</html>

