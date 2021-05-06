<?php

use Producto as GlobalProducto;

class Producto{

    public $id;
    public $codigo;
    public $nombre;
    public $tipo;
    public $stock;
    public $precio;
    public $fechaCreacion;
    public $fechaModificacion;

    function __construct()
    {
        
        
    }

    static function CrearProducto($id=null,$codigo=null,$nombre=null,$tipo=null,$stock=null,$precio=null,$fechaCreacion=null,$fechaModificacion=null)
    {
        $p=new Producto();

        $p->id=$id;
        $p->codigo=$codigo;
        $p->nombre=$nombre;
        $p->tipo=$tipo;
        $p->stock=intval($stock);
        $p->precio = $precio;
        if($fechaCreacion == null)
        {
            $p->fechaCreacion = new DateTime('now');
        }
        else
        {
            $p->fechaCreacion = $fechaCreacion;
        }

        if($fechaModificacion == null)
        {
            $p->fechaModificacion = new DateTime('now');
        }
        else
        {
            $p->fechaModificacion = $fechaModificacion;
        }
        
        return $p;
    }

   

    static function ValidarProducto($productoIngresado)
    {
        $esCorrecto = false;

        if(!empty($productoIngresado->codigo) && !empty($productoIngresado->nombre) && !empty($productoIngresado->tipo) && !empty($productoIngresado->stock) && !empty($productoIngresado->precio))
        {
            $esCorrecto=true; //Agregar validaciones.
        }
                 
        
        return $esCorrecto;

    }


    static function SelectAllProductosBD()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("select id, codigo_de_barra as codigo, nombre, tipo, stock, precio, fecha_de_creacion as fechaCreacion, fecha_de_modificacion as fechaModificacion from productos");
        $consulta->execute();			
        return $consulta->fetchAll(PDO::FETCH_CLASS, "Producto");	
    }

    static function BuscarProductoBD($producto)
    {
        $retorno="";
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("select id, codigo_de_barra as codigo, nombre, tipo, stock, precio, fecha_de_creacion as fechaCreacion, fecha_de_modificacion as fechaModificacion from productos where codigo_de_barra = :codigo_de_barra");
        $consulta->bindValue(':codigo_de_barra',$producto->codigo, PDO::PARAM_INT);
        $consulta->execute();			
        $respConsulta=$consulta->fetchAll(PDO::FETCH_CLASS, "Producto");	

        if (sizeof($respConsulta)==0)
        {   
           $producto->InsertarProductoParametros();
           $retorno = "Ingresado";
        }else
        {
            foreach ($respConsulta as  $value) {
                $value->stock= $value->stock + $producto->stock;
                $value->UpdateStockProducto();
                $retorno = "Actualizado";
            }

        }

        return $retorno;
    }

    public function UpdateStockProducto()
    {
           $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
           $consulta =$objetoAccesoDato->RetornarConsulta("
               update productos 
               set stock=:stock,
               WHERE codigo_de_barra=:codigo");
           $consulta->bindValue(':codigo',$this->codigo, PDO::PARAM_INT);
           $consulta->bindValue(':stock', $this->stock, PDO::PARAM_STR);
           return $consulta->execute();
    }
    
    public function InsertarProductoParametros()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into productos (codigo_de_barra,nombre,tipo,stock,precio,fecha_de_creacion,fecha_de_modificacion)values(:codigo_de_barra,:nombre,:tipo,:stock,:precio,:fecha_de_creacion,:fecha_de_modificacion)");
        $consulta->bindValue(':codigo_de_barra',$this->codigo, PDO::PARAM_INT);
        $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':tipo', $this->tipo, PDO::PARAM_STR);
        $consulta->bindValue(':stock', $this->stock, PDO::PARAM_STR);
        $consulta->bindValue(':precio', $this->precio, PDO::PARAM_INT);
        $consulta->bindValue(':fecha_de_creacion', ($this->fechaCreacion)->format('Y/m/d'), PDO::PARAM_STR);
        $consulta->bindValue(':fecha_de_modificacion', ($this->fechaModificacion)->format('Y/m/d'), PDO::PARAM_STR);
        $consulta->execute();		
        $this->id = $objetoAccesoDato->RetornarUltimoIdInsertado();
        return $this->id;
    }

    function __toString()
    {
        return "<li>" .  $this->id . ' ' . $this->codigo . ' ' . $this->nombre . ' ' . $this->tipo . ' ' .  $this->stock . ' ' . $this->precio . ' ' . $this->fechaCreacion.' ' .$this->fechaModificacion . "</li>" ;
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