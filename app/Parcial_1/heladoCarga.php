<?php

include 'helado.php';


$pathHelados="helados.json";
$helado=Helado::CrearHelado();



if(isset($_GET['sabor']) && !empty($_GET['precioBruto']) && !empty($_GET['tipo']) && !empty($_GET['cantidad']) )
{

    $helado->sabor = $_GET['sabor'];
    $helado->precioBruto= $_GET['precioBruto'];
    $helado->setPrecio();
    $helado->tipo = $_GET['tipo'];
    $helado->cantidad = $_GET['cantidad'];
   

    if(Helado::ValidarHelado($helado))
    {
       
        echo Helado::BuscarHelado($helado,$pathHelados);
    }
    else
    {
        echo "CAMPOS VACIOS";
    }
   

}



?>