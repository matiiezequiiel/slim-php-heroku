<?php


include 'Venta.php';
include 'AccesoDatos.php';


$venta = new Venta();


if(isset($_POST["mail"]) && isset($_POST["sabor"]) && isset($_POST["tipo"]) && isset($_POST["cantidad"]))
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