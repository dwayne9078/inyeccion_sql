<?php

    include_once "conexion.php";

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = $_POST['id'];
        $sql = "delete from cliente where id_cliente = '$id'";
        $query = mysqli_query($mysql, $sql);
    
        if($query){
            echo "<script> alert('CLIENTE ELIMINADO') </script>";
        } else {
            echo "<script> alert('NO SE PUDO ELIMINAR AL CLIENTE') </script>";
    
        }
    }
    

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="menu.php">Regresar</a>
    <form action="<?php $_SERVER['PHP_SELF'] ?> " method="post">
        <input type="number" name="id" placeholder="id del cliente">
        <input type="submit" value="Eliminar">
    </form>
</body>
</html>