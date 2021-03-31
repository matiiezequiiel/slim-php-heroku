<?php

// echo "Array GET :";
// var_dump($_GET); //Variable super global GET. PASAR POR PARAMS.
 
// echo '<br/>';

// echo "Array POST :";
// var_dump($_POST); //Variable super global POST. PASAR POR BODY.


echo '<br/>';

include './class/Usuario.php';

$nuevoUsuario = new Usuario();
$nuevoUsuario->usuario = $_POST["usuario"];
$nuevoUsuario->clave = $_POST["clave"];

echo Usuario::ValidarUsuario($nuevoUsuario);

?>