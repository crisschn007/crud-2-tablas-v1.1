$(document).ready(function(){
    $("#main-content").load("inicio.php");

    $("#inicio-link").click(function(){
        $("#main-content").load("inicio.php");
    })

    $("#leer-link").click(function(){
        $("#main-content").load("leer.php");
    })
    //tipoProducto-link
    $("#tipoProducto-link").click(function(){
        $("#main-content").load("leertipoProducto.php");
    })
});