<?php
$server_name="localhost";
$user_name="root";
$passwrd="";
$DB_name="fabrica";
$conn= mysqli_connect($server_name, $user_name, $passwrd, $DB_name);

if ($conn-> connect_error) {
    die("Error de Conexion!!".$conn-> connect_error);
}else {
    //echo"Conexion Exitosa";
}
?>