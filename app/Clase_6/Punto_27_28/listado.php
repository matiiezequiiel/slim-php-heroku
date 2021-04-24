<?php
// Aguirre,Matias.
// Aplicación Nº 28 ( Listado BD)
// Archivo: listado.php
// método:GET
// Recibe qué listado va a retornar(ej:usuarios,productos,ventas)
// cada objeto o clase tendrán los métodos para responder a la petición
// devolviendo un listado <ul> o tabla de html <table>

include './class/Usuario.php';
include './class/Producto.php';
include './class/Venta.php';
include './class/AccesoDatos.php';


if(isset($_GET['listado']) && !empty($_GET['listado']))
{
    $listado=$_GET['listado'];

    switch($listado)
    {
       case  "usuarios":
           $usuarios=Usuario::SelectAllUsuariosBD();
           Usuario::Listar($usuarios);
        break;
       case  "productos":
            $arrayProductos= Producto::SelectAllProductosBD();
            Producto::Listar($arrayProductos);
        break;
       case  "ventas":
            $arrayVentas= Venta::SelectAllVentasBD();
            Venta::Listar($arrayVentas);
        break;
    }

}






?>