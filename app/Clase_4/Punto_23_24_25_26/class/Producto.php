<?php

class Producto{

    public $codigo;
    public $nombre;
    public $tipo;
    public $stock;
    public $precio;
    public $id;

    function __construct($codigo=null,$nombre=null,$tipo=null,$stock=null,$precio=null,$id=null)
    {
        $this->codigo=$codigo;
        $this->nombre=$nombre;
        $this->tipo=$tipo;
        $this->stock=intval($stock);
        if($id == null)
        {
            $this->id = rand(1,10000);
        }
        else
        {
            $this->id=$id;
        }
        
        $this->precio = $precio;;
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

    static function BuscarProducto($producto)
    {
        $baseProductos = Producto::LeerJSON();
        $retorno=null;
        $encontre=false;

        foreach ($baseProductos as  $value) {
            if ($producto->codigo == $value -> codigo )
            {
                echo ($producto->stock .  $value->stock );
                $value->stock =  $producto->stock +  $value->stock ;
                echo ($value->stock );
                $retorno = "Actualizado";
                $encontre=true;
                break;
            }
          
        }

        if(!$encontre)
        {
            if(Producto::AltaProducto($producto))
            {
                $retorno = "Ingresado";
            }
            else
            {
                $retorno = "No se pudo hacer el alta";

            }
           
        }

        return $retorno;
    }

    static function LeerJSON()
    {
        $a=array();
        $b=array();

     
        if(($archivo=fopen("productos.json","r")) != false)
        {
            $dato = fread($archivo,filesize("productos.json"));
            $a=json_decode($dato);
              
        }

        foreach ($a as $key) {
            array_push($b,new Producto($key->codigo,$key->nombre,$key->tipo,$key->stock,$key->precio,$key->id)) ;
        }

        fclose($archivo);

        return $b;
    }

    static function AltaProducto($nuevoProducto)
    {
        $altaCorrecta=false;
        $a=Producto::LeerJSON();
        array_push($a,$nuevoProducto);
          
        $miArchivo = fopen("productos.json", "w"); //Guardo el puntero al archivo que voy a escribir.
        $retorno= fwrite($miArchivo, json_encode($a,JSON_PRETTY_PRINT) . "\n");

        if($retorno != false)
        {
            $altaCorrecta=true;
        }

        fclose($miArchivo);

        return $altaCorrecta;

    }
    



}




?>