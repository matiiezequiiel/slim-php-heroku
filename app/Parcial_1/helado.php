<?php

class Helado{    

    public $id;
    public $sabor;
    public $precioBruto;
    public $precioFinal;
    public $tipo;
    public $cantidad;


    function __construct()
    {
        
        
    }

    static function CrearHelado($id=null,$sabor=null,$precioBruto=null,$precioFinal=null,$tipo=null,$cantidad=null)
    {
        $p=new Helado();

        if($id == null){
            $p->id =rand(0,1000);
        }
        else{
            $p->id=$id;
        }
        
        $p->sabor=$sabor;
        $p->tipo=$tipo;
        $p->precioBruto = $precioBruto;
        $p->precioFinal = $precioFinal;
        $p->cantidad = $cantidad;
        
        

        return $p;
    }

    public function setPrecio()
    {
        $this->CalcularIVA();
    }

    

    static function ValidarHelado($heladoIngresado)
    {
        $esCorrecto = false;

        if(!empty($heladoIngresado->sabor) && !empty($heladoIngresado->tipo) && !empty($heladoIngresado->cantidad) && !empty($heladoIngresado->precioBruto) )//&& !empty($heladoIngresado->precioFinal))
        {
            $esCorrecto=true; //Agregar validaciones.
        }
                    
        
        return $esCorrecto;

    }

    public function CalcularIVA()
    {
        $this->precioFinal= $this->precioBruto * 1.21;
    }


   
    static function LeerJSON($path)
    {
        $a=array();
        $b=array();

     
        if(($archivo=fopen($path,"r")) != false)
        {
            $dato = fread($archivo,filesize($path));
            $a=json_decode($dato);            
        }

        foreach ($a as $key) {
            array_push($b,Helado::CrearHelado($key->id,$key->sabor,$key->precioBruto,$key->precioFinal,$key->tipo,$key->cantidad)) ;
        }

        fclose($archivo);

        return $b;
    }

    static function GuardarJSON($obj,$path)
    {
        $altaCorrecta=false;
        $a=Helado::LeerJSON($path);
        array_push($a,$obj);
          
        $miArchivo = fopen($path, "w"); //Guardo el puntero al archivo que voy a escribir.
        $retorno= fwrite($miArchivo, json_encode($a,JSON_PRETTY_PRINT) . "\n");

        if($retorno != false)
        {
            $altaCorrecta=true;
        }

        fclose($miArchivo);

        return $altaCorrecta;

    }

    static function BuscarHelado($helado,$path)
    {
        $baseProductos = Helado::LeerJSON($path);
        //var_dump($baseProductos);
        $retorno=null;
        $encontre=false;

        var_dump($baseProductos);
        foreach ($baseProductos as  $value) {
            if ($helado->sabor == $value -> sabor && $helado->tipo == $value -> tipo )
            {
                echo "entre";
                $value->cantidad =  $helado->cantidad +  $value->cantidad ;
                $value->precioBruto= $helado->precioBruto;
                $value->setPrecio();
                Helado::ActualizarHelado($baseProductos,$path);
                $retorno = "Actualizado";
                $encontre=true;
                break;
            }
          
        }

        if(!$encontre)
        {
            if(Helado::AltaHelado($helado,$path))
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

    static function ActualizarHelado($nuevaBaseProd,$path)
    {
        $altaCorrecta=false;    
          
        $miArchivo = fopen($path, "w"); //Guardo el puntero al archivo que voy a escribir.
        $retorno= fwrite($miArchivo, json_encode($nuevaBaseProd,JSON_PRETTY_PRINT) . "\n");

        if($retorno != false)
        {
            $altaCorrecta=true;
        }

        fclose($miArchivo);

        return $altaCorrecta;

    }

    static function AltaHelado($nuevoHelado,$path)
    {
        $altaCorrecta=false;
        $a=Helado::LeerJSON($path);
        array_push($a,$nuevoHelado);
          
        $miArchivo = fopen($path, "w"); //Guardo el puntero al archivo que voy a escribir.
        $retorno= fwrite($miArchivo, json_encode($a,JSON_PRETTY_PRINT) . "\n");

        if($retorno != false)
        {
            $altaCorrecta=true;
        }

        fclose($miArchivo);

        return $altaCorrecta;

    }

    static function BuscarHeladoPorSaborTipo($helado,$path)
    {
        $baseHelados = Helado::LeerJSON($path);
        $retorno=null;

        foreach ($baseHelados as  $value) {
            if($value->tipo == $helado -> tipo  && $value->sabor == $helado -> sabor) 
            {
                $retorno = "Si hay";
                break;
            }
            else if($value->tipo != $helado -> tipo)
            {
                $retorno = "No existe el tipo.";
                continue;
            }else
            {
                $retorno = "No existe el sabor.";
                continue;

            }
             
          
        }

        return $retorno;
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