<?php
// Aguirre, Matias.
// Aplicación No 27 (Registro BD)
// Archivo: registro.php
// método:POST
// Recibe los datos del usuario( nombre,apellido, clave,mail,localidad )por POST ,
// crear un objeto con la fecha de registro y utilizar sus métodos para poder hacer el alta,
// guardando los datos la base de datos
// retorna si se pudo agregar o no.

include './class/Venta.php';
include './class/AccesoDatos.php';


$venta = new Venta();


if(isset($_POST["codigo"]) && isset($_POST["id"]) && isset($_POST["cantidad"]) )
{
    
    $venta->codigoProd = $_POST["codigo"];
    $venta->idComprador = $_POST["id"];
    $venta->cantidadVendidos = $_POST["cantidad"];


    if(Venta::ValidarVenta($venta))
    {   
        if($venta->InsertarVentaParametros() > 0){
            
            echo 'Alta en base de datos correcta, el id de la nueva venta es: ' . $venta->idVenta ;
        }
        else{
            echo "No se pudo dar de alta en la base de datos";
        }
        
    }
    else
    {
        echo "Datos vacios ";
    }
    

}
else
{
    echo "Faltan Datos";
}


?>