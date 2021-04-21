<?php

class Venta{

    public $idVenta;
    public $codigoProd;
    public $idComprador;
    public $cantidadVendidos;
    public $fechaVenta;

    function __construct($idVenta=null,$codigoProd=null,$idComprador=null,$cantidadVendidos=null,$fechaVenta=null)
    {
       
        $this->idVenta=$idVenta;
        $this->codigoProd=$codigoProd;
        $this->idComprador=$idComprador;
        $this->cantidadVendidos=$cantidadVendidos;

        if($fechaVenta == null)
        {
            $this->fechaVenta = new DateTime('now');
        }
        else
        {
            $this->fechaVenta = $fechaVenta;
        }
      
       
    }

    static function ValidarVenta($ventaIngresada)
    {
        $esCorrecto = false;

        if(!empty($ventaIngresada->codigoProd) && !empty($ventaIngresada->idComprador) && !empty($ventaIngresada->cantidadVendidos) )
        {
            $esCorrecto=true; //Agregar validaciones.
        }
                 
        
        return $esCorrecto;

    }

    public function InsertarVentaParametros()
    {
               $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
               $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into ventas (id_producto,id_usuario,cantidad,fecha_de_venta)values(:id_producto,:id_usuario,:cantidad,:fecha_de_venta)");
               $consulta->bindValue(':id_producto',$this->codigoProd, PDO::PARAM_STR);
               $consulta->bindValue(':id_usuario', $this->idComprador, PDO::PARAM_STR);
               $consulta->bindValue(':cantidad', $this->cantidadVendidos, PDO::PARAM_STR);
               $consulta->bindValue(':fecha_de_venta', ($this->fechaVenta)->format('Y/m/d'), PDO::PARAM_STR);
               $consulta->execute();		
               $this->idVenta = $objetoAccesoDato->RetornarUltimoIdInsertado();
               return $this->idVenta;
    }


}


?>