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

      
        if(!empty($usuarioIngresado->usuario) && !empty($usuarioIngresado->clave) && !empty($usuarioIngresado->mail) )
        {
            $esCorrecto=true; //Agregar validaciones.
        }
                 
        
        return $esCorrecto;

    }

    static function AltaUsuario($nuevoUsuario)
    {
        $altaCorrecta=false;
          
        $miArchivo = fopen("usuarios.csv", "a"); //Guardo el puntero al archivo que voy a escribir.
        $retorno= fwrite($miArchivo, $nuevoUsuario->usuario . "," . $nuevoUsuario->clave . "," .
        $nuevoUsuario->mail . "\n");

        if($retorno != false)
        {
            $altaCorrecta=true;
        }

        fclose($miArchivo);

        return $altaCorrecta;

    }

    static function LeerCsv($listado)
    {
        $a=array();

        if(($archivo=fopen("usuarios.csv","r")) != false)
        {
            while(($dato = fgetcsv($archivo)) != false)
            {
                array_push($a,new Usuario($dato[0],$dato[1],$dato[2])) ; 
            }

        }

        fclose($archivo);

        return $a;
    }

    function __toString()
    {
        return $this->usuario . ' ' . $this->clave . ' ' . $this->mail ;
    }

    static function Listar($array)
    {
        foreach ($array as $value) {
            echo $value;
            echo PHP_EOL;
        }
    }

}



?>