<?php
// Aguirre, Matias.
// Aplicación No 27 (Registro BD)
// Archivo: registro.php
// método:POST
// Recibe los datos del usuario( nombre,apellido, clave,mail,localidad )por POST ,
// crear un objeto con la fecha de registro y utilizar sus métodos para poder hacer el alta,
// guardando los datos la base de datos
// retorna si se pudo agregar o no.

include './class/Producto.php';
include './class/AccesoDatos.php';

$productoIngresado = new Producto();

if(isset($_POST["codigo"]) && isset($_POST["nombre"]) && isset($_POST["tipo"]) && isset($_POST["stock"]) && isset($_POST["precio"]) )
{
    
    $productoIngresado->codigo = $_POST["codigo"];
    $productoIngresado->nombre = $_POST["nombre"];
    $productoIngresado->tipo = $_POST["tipo"];
    $productoIngresado->stock = $_POST["stock"];
    $productoIngresado->precio = $_POST["precio"];

    if(Producto::ValidarProducto($productoIngresado))
    {   
        if($productoIngresado->InsertarProductoParametros() > 0)
        {   
            echo 'Alta en base de datos correcta, el id del nuevo producto es: ' . $productoIngresado->id ;
    
        }
        else
        {
            echo "No se pudo dar de alta en la base de datos";
        }

    }
    else
    {
        echo "Datos vacios";
    }

}
else
{
    echo "Faltan Datos";
}







?>