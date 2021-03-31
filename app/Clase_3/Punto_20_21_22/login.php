<?php
// Aguirre,Matias.
// Aplicación Nº 22 ( Login)
// Archivo: Login.php
// método:POST
// Recibe los datos del usuario(clave,mail )por POST ,
// crear un objeto y utilizar sus métodos para poder verificar si es un usuario registrado,
// Retorna un :
// “Verificado” si el usuario existe y coincide la clave también.
// “Error en los datos” si esta mal la clave.
// “Usuario no registrado si no coincide el mail“
// Hacer los métodos necesarios en la clase usuario

include './class/Usuario.php';


$usuarioIngresado = new Usuario();

if(isset($_POST["usuario"]) && !empty($_POST["usuario"]) && isset($_POST["clave"]) && !empty($_POST["clave"]) && isset($_POST["mail"]) && !empty($_POST["mail"]) )
{
    
    $usuarioIngresado->usuario = $_POST["usuario"];
    $usuarioIngresado->clave = $_POST["clave"];
    $usuarioIngresado->mail = $_POST["mail"];

    echo Usuario::BuscarUsuario($usuarioIngresado);
}
else
{
    echo "Espacios invalidos o vacios";
}

?>