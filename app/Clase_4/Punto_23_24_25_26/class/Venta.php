<?php

class Venta{

    public $codigoProd;
    public $idComprador;
    public $cantidadVendidos;
    public $id;

    function __construct($codigoProd=null,$idComprador=null,$cantidadVendidos=null,$id=null)
    {
        $this->codigoProd=$codigoProd;
        $this->idComprador=$idComprador;
        $this->cantidadVendidos=$cantidadVendidos;
        if($id == null)
        {
            $this->id = rand(1,10000);
        }
        else
        {
            $this->id=$id;
        }
       
    }

    static function AltaVenta($venta)
    {
        $altaCorrecta=false;
        $a=Venta::LeerJSON();
        array_push($a,$venta);
          
        $miArchivo = fopen("ventas.json", "w"); //Guardo el puntero al archivo que voy a escribir.
        $retorno= fwrite($miArchivo, json_encode($a,JSON_PRETTY_PRINT) . "\n");

        if($retorno != false)
        {
            $altaCorrecta=true;
        }

        fclose($miArchivo);

        return $altaCorrecta;

    }

    static function LeerJSON()
    {
        $a=array();
        $b=array();

     
        if(($archivo=fopen("ventas.json","r")) != false)
        {
            $dato = fread($archivo,filesize("ventas.json"));
            $a=json_decode($dato);
              
        }

        foreach ($a as $key) {
            array_push($b,new Venta($key->codigoProd,$key->idComprador,$key->cantidadVendidos,$key->id)) ;
        }

        fclose($archivo);

        return $b;
    }




}


?>