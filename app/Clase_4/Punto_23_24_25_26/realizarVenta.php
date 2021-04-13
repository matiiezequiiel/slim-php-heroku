<?php
// <!--Aguirre,Matias. 
// Aplicación No 26 (RealizarVenta)
// Archivo: RealizarVenta.php
// método:POST
// Recibe los datos del producto(código de barra), del usuario (el id )y la cantidad de ítems ,por
// POST .
// Verificar que el usuario y el producto exista y tenga stock.
// crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000).
// carga los datos necesarios para guardar la venta en un nuevo renglón.
// Retorna un :
// “venta realizada”Se hizo una venta
// “no se pudo hacer“si no se pudo hacer
// Hacer los métodos necesarios en las clases -->

include './class/Producto.php';
include './class/Usuario.php';
include './class/Venta.php';

$productoIngresado = new Producto();
$usuario = new Usuario();
$venta = new Venta();
$itemsVendidos;

if(isset($_POST["codigo"]) && isset($_POST["id"]) && isset($_POST["cantidad"]) )
{
    
    $productoIngresado->codigo = $_POST["codigo"];
    $usuario->id = $_POST["id"];
    $itemsVendidos = $_POST["cantidad"];


    if(Usuario::BuscarUsuarioId($usuario))
    {   
        if(Producto::BuscarProductoStock($productoIngresado,$itemsVendidos)){
            $venta->codigoProd =  $productoIngresado->codigo;
            $venta->idComprador = $usuario->id;
            $venta->cantidadVendidos =  $itemsVendidos;

            if(Venta::AltaVenta($venta)){
                echo "Venta correcta";
            }
            else{
                echo "No se pudo realizar la venta";
            }        

        }
        else{
            echo "Producto sin stock";
        }
        
    }
    else
    {
        echo "No existe usuario ";
    }
    

}
else
{
    echo "Faltan Datos";
}





?>