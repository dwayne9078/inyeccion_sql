<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <h1>Consultar Cliente y Pedido</h1>
    <a href="menu.php">Regresar</a>

    <table>
        <tr>
            <td>
                Id
            </td>
            <td>
                Nombre
            </td>
            <td>
                Email
            </td>
        </tr>
    <?php
    
    include_once ("conexion.php");

    $id = $_GET['id'];

    $sql = "select * from cliente where id_cliente = '$id'";
    $query = mysqli_query($mysql, $sql);

    while($result = mysqli_fetch_assoc($query)){
        echo "<tr>";
        echo "<td> $result[id_cliente] </td>";
        echo "<td> $result[nombre_cliente] </td>";
        echo "<td> $result[email_cliente] </td>";
        echo "</tr>";
    }
    
    ?>
    </table>

    <br>

    <table>
        <tr>
            <td>
                Id
            </td>
            <td>
                Cliente
            </td>
            <td>
                Producto
            </td>
            <td>
                Cantidad
            </td>
        </tr>
    <?php
    
    include_once ("conexion.php");

    $id2 = $_GET['id2'];

    $sql2 = "select * from pedidos where id_pedido = '$id2'";
    $query2 = mysqli_query($mysql, $sql2);

    while($result2 = mysqli_fetch_assoc($query2)){
        echo "<tr>";
        echo "<td> $result2[id_pedido] </td>";
        echo "<td> $result2[cliente] </td>";
        echo "<td> $result2[producto] </td>";
        echo "<td> $result2[cantidad]</td>";
        echo "</tr>";
    }
    
    ?>
    </table>
</body>
</html>