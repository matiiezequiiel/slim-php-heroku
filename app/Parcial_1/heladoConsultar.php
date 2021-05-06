<?php


include 'helado.php';

$pathHelados="helados.json";
$helado=Helado::CrearHelado();


if(isset($_POST['sabor']) && isset($_POST['tipo']))
{  
    $helado->sabor = $_POST['sabor'];
    $helado->tipo = $_POST['tipo'];

    echo Helado::BuscarHeladoPorSaborTipo($helado,$pathHelados);
}
else
{
    echo "Faltan datos";
}




?>