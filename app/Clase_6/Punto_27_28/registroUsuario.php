<?php
// Aguirre, Matias.
// Aplicación No 27 (Registro BD)
// Archivo: registro.php
// método:POST
// Recibe los datos del usuario( nombre,apellido, clave,mail,localidad )por POST ,
// crear un objeto con la fecha de registro y utilizar sus métodos para poder hacer el alta,
// guardando los datos la base de datos
// retorna si se pudo agregar o no.

include './class/Usuario.php';
include './class/AccesoDatos.php';


$nuevoUsuario = Usuario::CrearUsuario();




if(isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["mail"])  && isset($_POST["localidad"])
   && isset($_POST["clave"]))
{
    $nuevoUsuario->nombre = $_POST["nombre"];
    $nuevoUsuario->apellido = $_POST["apellido"];
    $nuevoUsuario->clave = $_POST["clave"];
    $nuevoUsuario->mail = $_POST["mail"];
    $nuevoUsuario->localidad = $_POST["localidad"];

    if(Usuario::ValidarUsuario($nuevoUsuario))
    {
        if($nuevoUsuario->InsertarUsuarioParametros() > 0)
        {   
           echo 'Alta en base de datos correcta, el id del nuevo usuario es: ' . $nuevoUsuario->id ;
    
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
    echo "Faltan datos";
}


?>