<?php
include("conexion.php");
$id = $_GET['id'];

$sql="DELETE FROM producto where id='$id'";
if($conn->query($sql)==TRUE){
    
    header("Location: leer.php?msg=Producto ha sido eliminado de la base de datos");
}
else{
    echo "Error: ".$sql- "<br>" .$conn->error;

}
?>
