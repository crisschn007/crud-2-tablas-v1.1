<?php
//DELETE FROM `tipoproducto` WHERE id
include 'conexion.php';
$id = $_GET['id'];

$sql="DELETE FROM `tipoproducto` WHERE id=$id";

if($conn->query($sql)==TRUE){
    
    header("Location: leertipoProducto.php?msg=Producto ha sido eliminado de la base de datos");
}
else{
    echo "Error: ".$sql- "<br>" .$conn->error;

}
?>
