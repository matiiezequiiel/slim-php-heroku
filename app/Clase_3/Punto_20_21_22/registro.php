<?php
// Aguirre, Matias.
// Aplicación Nº 20 (Registro CSV)
// Archivo: registro.php
// método:POST
// Recibe los datos del usuario(nombre, clave,mail )por POST ,
// crear un objeto y utilizar sus métodos para poder hacer el alta,
// guardando los datos en usuarios.csv.
// retorna si se pudo agregar o no.
// Cada usuario se agrega en un renglón diferente al anterior.
// Hacer los métodos necesarios en la clase usuario

include './class/Usuario.php';


$nuevoUsuario = new Usuario();

if(isset($_POST["usuario"]) && isset($_POST["clave"]) && isset($_POST["mail"]))
{
    $nuevoUsuario->usuario = $_POST["usuario"];
    $nuevoUsuario->clave = $_POST["clave"];
    $nuevoUsuario->mail = $_POST["mail"];

    if(Usuario::ValidarUsuario($nuevoUsuario))
    {   
        if(Usuario::AltaUsuario($nuevoUsuario))
        {
            echo "Alta correcta";
        }
        else
        {
            echo "No se pudo dar el alta";
        }

    }
    else
    {
        echo "Datos incorrecto";
    }

}
    



?>