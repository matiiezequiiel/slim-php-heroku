<?php

class Producto{

    public $id;
    public $codigo;
    public $nombre;
    public $tipo;
    public $stock;
    public $precio;
    public $fechaCreacion;
    public $fechaModificacion;

    function __construct($id=null,$codigo=null,$nombre=null,$tipo=null,$stock=null,$precio=null,$fechaCreacion=null,$fechaModificacion=null)
    {
        $this->id=$id;
        $this->codigo=$codigo;
        $this->nombre=$nombre;
        $this->tipo=$tipo;
        $this->stock=intval($stock);
        $this->precio = $precio;
        if($fechaCreacion == null)
        {
            $this->fechaCreacion = new DateTime('now');
        }
        else
        {
            $this->fechaCreacion = $fechaCreacion;
        }

        if($fechaModificacion == null)
        {
            $this->fechaModificacion = new DateTime('now');
        }
        else
        {
            $this->fechaModificacion = $fechaModificacion;
        }
        
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



}




?>