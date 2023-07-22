<?php

    if($_SERVER['REQUEST_METHOD'] === 'POST' ){
        include_once "conexion.php";

        $nombre_cliente = $_POST['inpt_nombre'];
        $email_cliente = $_POST['inpt_email'];

        $sql = "insert into cliente (nombre_cliente, email_cliente) values ('$nombre_cliente', '$email_cliente')";

        $query = mysqli_query($mysql, $sql);

        if($query){
            echo "<script> alert('CLIENTE AGREGADO CORRECTAMENTE') </script>";
        } else {
            echo "<script> alert('VERIFIQUE SUS DATOS') </script>";
        }
    }

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <a href="menu.php">Regresar</a>

    <form action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">

    <input type="text" name="inpt_nombre" placeholder="Nombre Del Cliente">
    <input type="email" name="inpt_email" placeholder="Email del Cliente">

    <input type="submit" value="Registrar Cliente">

    </form>
</body>
</html>