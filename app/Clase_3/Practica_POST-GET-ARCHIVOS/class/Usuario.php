<?php

class Usuario{

    public $usuario;
    public $clave;
    

    static function ValidarUsuario($usuarioIngresado)
    {
        $estado=null;

        if(isset($usuarioIngresado->usuario) && isset($usuarioIngresado->clave) ) //Me fijo que este seteada la variable.
        {

            if($usuarioIngresado->usuario == "admin" && $usuarioIngresado->clave == "1234")
            {
                
                $estado = "Acceso correcto";
            }
            else
            {
                $estado = "Usuario o clave incorrecta";
            }

        }
        else
        {
            $estado = "Faltan datos";
        }     
        
        
        $miArchivo = fopen("log.txt", "a"); //Guardo el puntero al archivo que voy a escribir.
        fwrite($miArchivo,$estado . "," . $usuarioIngresado->usuario . "," . date("F j, Y, g:i a") . "\n");
        fclose($miArchivo);

        return $estado;

    }

}



?>