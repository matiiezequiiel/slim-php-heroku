<?php
// Aguirre, Matias.
// Aplicación No 29( Login con bd)
// Archivo: Login.php
// método:POST
// Recibe los datos del usuario(clave,mail )por POST ,
// crear un objeto y utilizar sus métodos para poder verificar si es un usuario registrado en la
// base de datos,
// Retorna un :
// “Verificado” si el usuario existe y coincide la clave también.
// “Error en los datos” si esta mal la clave.
// “Usuario no registrado si no coincide el mail“
// Hacer los métodos necesarios en la clase usuario.

include './class/Usuario.php';
include './class/AccesoDatos.php';


$usuarioIngresado = Usuario::CrearUsuario();


if(isset($_POST["clave"]) && isset($_POST["mail"]) )
{
    $usuarioIngresado->clave = $_POST["clave"];
    $usuarioIngresado->mail = $_POST["mail"];

    if(Usuario::ValidarUsuarioLogin($usuarioIngresado))
    {   
        echo Usuario::LoginUsuarioBD($usuarioIngresado->mail,$usuarioIngresado->clave);

    }
    else
    {
        echo "Datos incorrecto";
    }
} 
else
{
    echo "Faltan datos.";
}



?>
