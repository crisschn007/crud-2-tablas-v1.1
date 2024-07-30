<?php
//insertar
include 'conexion.php';


if($_SERVER["REQUEST_METHOD"]=="POST") {
    //guardamos en variables los valores que
    //vamos a enviar a la base de datos

    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $tipo_id = $_POST['tipo_id'];

    //creamos la consulta de insertar

    $sql = "INSERT INTO producto(nombre,precio,tipo_id) values
('$nombre','$precio','$tipo_id')";

    if ($conn->query($sql) == TRUE) {
        //echo "Producto ha sido insertado exitosamente";
        header("Location:leer.php?msg=Ha sido agregado un Nuevo Producto");
    } else {
        echo "Error! " . $sql . "<br>" - $conn->error;
    }
}
//ahora voy hacer el select para seleccionar el tipo de producto
$sql = "SELECT *FROM tipoproducto";
$resultado = $conn->query($sql);

?>


