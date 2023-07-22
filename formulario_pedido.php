<?php

    include_once "conexion.php";
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nombre_producto = $_POST['inpt_producto'];
        $cantidad_producto = $_POST['inpt_cantidad'];
        $cliente = $_POST['inpt_cliente'];

        /* $sql2 = "insert into pedidos (cliente, producto, cantidad) values ('$cliente', '$nombre_producto', '$cantidad_producto')";
        $query2 = mysqli_query($mysql, $sql2);
        if($query2){
            echo "<script> alert('PEDIDO REGISTRADO CORRECTAMENTE') </script>";
        } else {
            echo "<script> alert('NO FUE POSIBLE REGISTRAR EL PEDIDO') </script>";
        } */
        $stmt_sql = "insert into pedidos (cliente, producto, cantidad) values (?, ?, ?)";

        $stmt = mysqli_prepare($mysql, $stmt_sql);
        mysqli_stmt_bind_param($stmt, "sss", $cliente, $nombre_producto, $cantidad_producto );
        $exec = mysqli_stmt_execute($stmt);

        if($exec){
            echo "<script> alert('PEDIDO REGISTRADO CORRECTAMENTE') </script>";
        } else {
            echo "<script> alert('NO FUE POSIBLE REGISTRAR EL PEDIDO') </script>";
        }
    }

    $sql = "select id_cliente, nombre_cliente from cliente";
    $query = mysqli_query($mysql, $sql);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <a href="menu.php">Regresar</a>
    <form action=" <?php htmlspecialchars( $_SERVER['PHP_SELF']) ?> " method="post">
    <input type="text" name="inpt_producto" placeholder="Nombre del Producto" >
    <input type="number" name="inpt_cantidad" placeholder="Cantidad del Producto">
    <select name="inpt_cliente">

    <?php
    
        while($result = mysqli_fetch_assoc($query)){
            echo "<option value='$result[id_cliente]'>$result[nombre_cliente]</option>";
        }
    
    ?>

    </select>

    <input type="submit" value="Registrar Pedido">

    </form>
</body>
</html>