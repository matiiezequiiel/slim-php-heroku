<?php
// Aguirre, Matias.
// Aplicación No 23 (Registro JSON)
// Archivo: registro.php
// método:POST
// Recibe los datos del usuario(nombre, clave,mail )por POST ,
// crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000).
// crear un dato con la fecha de registro , toma todos los datos y utilizar sus métodos para
// poder hacer el alta,
// guardando los datos en usuarios.json y subir la imagen al servidor en la carpeta
// Usuario/Fotos/.
// retorna si se pudo agregar o no.
// Cada usuario se agrega en un renglón diferente al anterior.
// Hacer los métodos necesarios en la clase usuario.

include './class/Usuario.php';


$nuevoUsuario = new Usuario();
$destino = "./usuarios/fotos/" ;




if(isset($_POST["usuario"]) && isset($_POST["clave"]) && isset($_POST["mail"])  && !empty($_FILES["archivo"] ["tmp_name"]))
{
    $nuevoUsuario->usuario = $_POST["usuario"];
    $nuevoUsuario->clave = $_POST["clave"];
    $nuevoUsuario->mail = $_POST["mail"];

    if(Usuario::ValidarUsuario($nuevoUsuario))
    {   
        if(Usuario::GuardarJSON($nuevoUsuario))
        {
            if($nuevoUsuario->GuardarImagen($destino))
            {
                echo "Alta correcta";
            }
            else
            {
                echo "Fallo la subida de la imagen";
            }
            
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