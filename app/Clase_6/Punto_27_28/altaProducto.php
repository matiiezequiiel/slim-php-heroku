<?php
// Aguirre,Matias.
// Aplicación No 30 ( AltaProducto BD)
// Archivo: altaProducto.php
// método:POST
// Recibe los datos del producto(código de barra (6 sifras ),nombre ,tipo, stock, precio )por POST
// , carga la fecha de creación y crear un objeto ,se debe utilizar sus métodos para poder
// verificar si es un producto existente,
// si ya existe el producto se le suma el stock , de lo contrario se agrega .
// Retorna un :
// “Ingresado” si es un producto nuevo
// “Actualizado” si ya existía y se actualiza el stock.
// “no se pudo hacer“si no se pudo hacer
// Hacer los métodos necesarios en la clase

include './class/Producto.php';
include './class/AccesoDatos.php';



$productoIngresado = Producto::CrearProducto();

if(isset($_POST["codigo"]) && isset($_POST["nombre"]) && isset($_POST["tipo"]) && isset($_POST["stock"]) && isset($_POST["precio"]) )
{
    
    $productoIngresado->codigo = $_POST["codigo"];
    $productoIngresado->nombre = $_POST["nombre"];
    $productoIngresado->tipo = $_POST["tipo"];
    $productoIngresado->stock = $_POST["stock"];
    $productoIngresado->precio = $_POST["precio"];

    if(Producto::ValidarProducto($productoIngresado))
    {   
        echo Producto::BuscarProductoBD($productoIngresado);

    }
    else
    {
        echo "No se pudo hacer";
    }

}
else
{
    echo "Faltan Datos";
}

?>