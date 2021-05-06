<?php

class Venta{

    public $feLL;
    public $codigoProd;
    public $mailComprador;
    public $cantidadVendidos;
    public $fechaVenta;

    function __construct()
    {
        
    }

    static function CrearVenta($idVenta=null,$codigoProd=null,$mailComprador=null,$cantidadVendidos=null,$fechaVenta=null)
    {
       
        $v=new Venta();

        $v->idVenta=$idVenta;
        $v->codigoProd=$codigoProd;
        $v->mailComprador=$mailComprador;
        $v->cantidadVendidos=$cantidadVendidos;

        if($fechaVenta == null)
        {
            $v->fechaVenta = new DateTime('now');
        }
        else
        {
            $v->fechaVenta = $fechaVenta;
        }
      
       
    }

    static function ValidarVenta($ventaIngresada)
    {
        $esCorrecto = false;

        if(!empty($ventaIngresada->codigoProd) && !empty($ventaIngresada->mailComprador) && !empty($ventaIngresada->cantidadVendidos) )
        {
            $esCorrecto=true; //Agregar validaciones.
        }
                 
        
        return $esCorrecto;

    }

    // public static function SelectAllVentasBD()
	// {
	// 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	// 		$consulta =$objetoAccesoDato->RetornarConsulta("select id as idVenta, id_producto as codigoProd, id_usuario as idComprador, cantidad as cantidadVendidos, fecha_de_venta as fechaVenta from ventas");
	// 		$consulta->execute();			
	// 		return $consulta->fetchAll(PDO::FETCH_CLASS, "Venta");		
	// }

    // public function InsertarVentaParametros()
    // {
    //            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
    //            $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into ventas (id_producto,id_usuario,cantidad,fecha_de_venta)values(:id_producto,:id_usuario,:cantidad,:fecha_de_venta)");
    //            $consulta->bindValue(':id_producto',$this->codigoProd, PDO::PARAM_STR);
    //            $consulta->bindValue(':id_usuario', $this->idComprador, PDO::PARAM_STR);
    //            $consulta->bindValue(':cantidad', $this->cantidadVendidos, PDO::PARAM_STR);
    //            $consulta->bindValue(':fecha_de_venta', ($this->fechaVenta)->format('Y/m/d'), PDO::PARAM_STR);
    //            $consulta->execute();		
    //            $this->idVenta = $objetoAccesoDato->RetornarUltimoIdInsertado();
    //            return $this->idVenta;
    // }

    // function __toString()
    // {
    //     return "<li>" .  $this->idVenta . ' ' . $this->codigoProd . ' ' . $this->idComprador . ' ' . $this->cantidadVendidos . "</li>" ;
    // }

    // static function Listar($array)
    // {
    //     echo "<ul>";
    //     foreach ($array as $value) {
    //         echo $value;
    //     }
    //     echo "</ul>";
       
    // }

}


?>