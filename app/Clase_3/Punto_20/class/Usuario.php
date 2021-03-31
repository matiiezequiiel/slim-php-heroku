<?php

class Usuario{

    public $usuario;
    public $clave;
    public $mail;
    
    function __construct($usuario=null,$clave=null,$mail=null)
    {
        $this->usuario=$usuario;
        $this->clave=$clave;
        $this->mail=$mail;
    }

    static function ValidarUsuario($usuarioIngresado)
    {
        $esCorrecto = false;

        if(isset($usuarioIngresado->usuario)  && isset($usuarioIngresado->clave) && isset ($usuarioIngresado->mail) )
        {
            if(!empty($usuarioIngresado->usuario) && !empty($usuarioIngresado->clave) && !empty($usuarioIngresado->mail) )
            {
                $esCorrecto=true; //Agregar validaciones.
            }
            
        }
        
        return $esCorrecto;

    }

    static function AltaUsuario($nuevoUsuario)
    {
        $altaCorrecta=false;
          
        $miArchivo = fopen("usuarios.csv", "a"); //Guardo el puntero al archivo que voy a escribir.
        $retorno= fwrite($miArchivo, $nuevoUsuario->usuario . ";" . $nuevoUsuario->clave . ";" .
        $nuevoUsuario->mail . "\n");

        if($retorno != false)
        {
            $altaCorrecta=true;
        }

        fclose($miArchivo);

        return $altaCorrecta;

    }

}



?>