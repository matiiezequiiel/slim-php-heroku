<?php


class Usuario{

    public $id;
    public $nombre;
    public $apellido;
    public $clave;
    public $mail;
    public $localidad;
    public $fechaRegistro;

    

    private function __construct()
    {
        
    }

    static function CrearUsuario($id=null,$nombre=null,$apellido=null,$clave=null,$mail=null,$localidad=null)
    {
        $u=new Usuario();

        $u->id=$id;
        $u->nombre=$nombre;
        $u->apellido=$apellido;
        $u->clave=$clave;
        $u->mail=$mail;
        $u->fechaRegistro = new DateTime('now');
        $u->localidad=$localidad;

        return $u;
       
    }

    static function ValidarUsuario($usuarioIngresado)
    {
        $esCorrecto = false;

        if(!empty($usuarioIngresado->nombre) && !empty($usuarioIngresado->clave) && !empty($usuarioIngresado->mail) 
          && !empty($usuarioIngresado->apellido) && !empty($usuarioIngresado->localidad) )
        {
            $esCorrecto=true; //Agregar validaciones.
        }
                 
        
        return $esCorrecto;

    }

    static function ValidarUsuarioLogin($usuarioIngresado)
    {
        $esCorrecto = false;

        if(!empty($usuarioIngresado->clave) && !empty($usuarioIngresado->mail))
        {
            $esCorrecto=true; //Agregar validaciones.
        }
                 
        
        return $esCorrecto;

    }

    public function InsertarUsuarioParametros()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into usuarios (nombre,apellido,clave,mail,fecha_de_registro,localidad)values(:nombre,:apellido,:clave,:mail,:fecha_de_registro,:localidad)");
        $consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
        $consulta->bindValue(':clave', $this->clave, PDO::PARAM_STR);
        $consulta->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $consulta->bindValue(':fecha_de_registro', ($this->fechaRegistro)->format('Y/m/d'), PDO::PARAM_STR);
        $consulta->bindValue(':localidad', $this->localidad, PDO::PARAM_STR);
        $consulta->execute();		
        $this->id = $objetoAccesoDato->RetornarUltimoIdInsertado();
        return $this->id;
    }

    public static function SelectAllUsuariosBD()
	{
       
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("select id,nombre,apellido,clave,mail,fecha_de_registro as fechaRegistro,localidad from usuarios");
        $consulta->execute();			
        return $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");
        		
	}

    public static function LoginUsuarioBD($mail,$clave) 
	{
            $retorno="";
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id,nombre,apellido,clave,mail,fecha_de_registro as fechaRegistro,localidad from usuarios where mail = :mail");
            $consulta->bindValue(':mail', $mail, PDO::PARAM_STR);
			$consulta->execute();
			$usuarios= $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");
			
            if (sizeof($usuarios)==0)
            {   
                $retorno="Usuario no registrado";
            }
            else
            {
                foreach ($usuarios as $value) {
                    if($value->mail == $mail && $value->clave == $clave)
                    {
                        $retorno= "Verificado";
                        break;
                    }
                    else
                    {
                        $retorno= "Error en los datos";
                    }
                }
            }
                
            
            return $retorno;				

			
	}

    function __toString()
    {
        return "<li>" .  $this->id . ' ' . $this->nombre . ' ' . $this->apellido . ' ' . $this->clave . ' ' .  $this->mail . ' ' . $this->fechaRegistro .' ' . $this->localidad . "</li>" ;
    }

    static function Listar($array)
    {
        echo "<ul>";
        foreach ($array as $value) {
            echo $value;
        }
        echo "</ul>";
    }



   

}



?>