<?php


class Usuario{

    public $usuario;
    public $clave;
    public $mail;
    public $id;
    public $fecha;
    
    function __construct($usuario=null,$clave=null,$mail=null,$id=null,$fecha=null)
    {
        $this->usuario=$usuario;
        $this->clave=$clave;
        $this->mail=$mail;
        if($id == null)
        {
            $this->id = rand(1,10000);
        }
        else
        {
            $this->id=$id;
        }

        if($fecha == null)
        {
            $this->fecha = new DateTime('now');
        }
        else
        {
            $this->fecha = $fecha;
        }
        
        
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

    static function GuardarJSON(Usuario $nuevoUsuario)
    {
        $altaCorrecta=false;
        $a=Usuario::LeerJSON();
        array_push($a,$nuevoUsuario);
          
        $miArchivo = fopen("usuarios.json", "w"); //Guardo el puntero al archivo que voy a escribir.
        $retorno= fwrite($miArchivo, json_encode($a,JSON_PRETTY_PRINT) . "\n");

        if($retorno != false)
        {
            $altaCorrecta=true;
        }

        fclose($miArchivo);

        return $altaCorrecta;

    }

    function GuardarImagen($destino)
    {
        $altaCorrecta=false;
        $extension = explode(".", $_FILES ["archivo"] ["name"]);
        $nombre= explode("@", $this->mail);
        $destino .= $nombre[0] . "." . $extension[1];

        if($extension[1] == "jpg")
         {
            if(move_uploaded_file( $_FILES["archivo"] ["tmp_name"],$destino))
            {
                $altaCorrecta=true;
            }

        }

        return $altaCorrecta;      

    }

    static function LeerCsv()
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

    static function LeerJSON()
    {
        $a=array();
        $b=array();

     
        if(($archivo=fopen("usuarios.json","r")) != false)
        {
            $dato = fread($archivo,filesize("usuarios.json"));
            $a=json_decode($dato);
              
        }

        foreach ($a as $key) {
            array_push($b,new Usuario($key->usuario,$key->clave,$key->mail,$key->id,$key->fecha)) ;
        }

        fclose($archivo);

        return $b;
    }

    function __toString()
    {
        return $this->usuario . ' ' . $this->clave . ' ' . $this->mail . ' ' . $this->id . ' ' . ($this->fecha)->format('d-m-Y') ;
    }

    static function Listar($array)
    {
        foreach ($array as $value) {
            echo $value;
            echo PHP_EOL;
        }
    }

    static function BuscarUsuario($usuario)
    {
        $baseUsuarios = Usuario::LeerJSON();
        $retorno=null;

        foreach ($baseUsuarios as  $value) {
            if($usuario->mail != $value -> mail)
            {
                $retorno = "Usuario no registrado";
                continue;
            }
            else if ($usuario->mail == $value->mail && $usuario->clave != $value->clave || $usuario->mail == $value->mail && $usuario->usuario != $value->usuario )
            {
                 $retorno = "Error en los datos";
                 break;
            }
            else if($usuario->mail == $value->mail && $usuario->clave == $value->clave && $usuario->usuario == $value->usuario)
           {
               $retorno = "Verificado";
               break;
           }     
          
        }

        return $retorno;
    }

    static function BuscarUsuarioId($usuario)
    {
        $baseUsuarios = Usuario::LeerJSON();
        $existe=false;

        foreach ($baseUsuarios as  $value) {
            if($usuario->id == $value -> id)
            {
                $existe=true;
                break;
            }
            
          
        }
        return $existe;
    }

}



?>