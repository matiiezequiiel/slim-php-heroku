<?php
// Aguirre,Matias.
// Aplicación Nº 21 ( Listado CSV y array de usuarios)
// Archivo: listado.php
// método:GET
// Recibe qué listado va a retornar(ej:usuarios,productos,vehículos,...etc),por ahora solo tenemos
// usuarios).
// En el caso de usuarios carga los datos del archivo usuarios.csv.
// se deben cargar los datos en un array de usuarios.
// Retorna los datos que contiene ese array en una lista
// <ul>
// <li>Coffee</li>
// <li>Tea</li>
// <li>Milk</li>
// </ul>
// Hacer los métodos necesarios en la clase usuario

include './class/Usuario.php';


if(isset($_GET['listado']) && !empty($_GET['listado']))
{
    $listado=$_GET['listado'];

    switch($listado)
    {
        case  "usuarios":
            $arrayUsuarios= Usuario::LeerCsv();
            Usuario::Listar($arrayUsuarios);
        break;
    }

}






?>