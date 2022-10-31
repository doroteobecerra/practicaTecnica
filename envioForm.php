<?php
    if(isset($_POST['guardar'])){
        //declaracion de variables
        $idsku = $_POST['sku'];
        $articulo = $_POST['articulo'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $familias = $_POST['familias'];
        $alta = $_POST['alta'];
        $stock = $_POST['stock'];
        $cantidad = $_POST['cantidad'];
        $descontinuado = $_POST['descontinuado'];
        $baja = $_POST['baja'];

        if($cantidad > $stock){
            echo "<div class='alert alert-danger' role='alert'>
            La cantidad no puede ser mayor al stock
            </div>";
        } else{
            include('connection/Connection.php'); 
            $sql = "INSERT INTO articulos (sku, articulo, marca, modelo, familia_id, f_alta, stock, cantidad, descontinuado, f_baja)
            VALUES ('".$idsku."', '".$articulo."', '".$marca."', '".$modelo."', '".$familias."', '".$alta."', '".$stock."', '".$cantidad."', '".$descontinuado."' , '".$baja."')";
            $resultado = mysqli_query($db, $sql);
            if($resultado){
                // echo "<script language='JavaScript'>
                // alert ('Datos ingresados correctamente');
                // </script>"; 
                echo "<div class='alert alert-success' role='alert'>
                Artículo ingresado con éxito
                </div>";
            header("Location : tabla.php");
            }else{
                echo "<div class='alert alert-error' role='alert'>
                Ocurrio un error
                </div>";
            }
            mysqli_close($db);
        }
            
      }
        

    ?>