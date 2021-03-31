<?php

class Auto{

    private $_color;
    private $_precio;
    private $_marca;
    private $_fecha;

 
    function __construct(){
        $params = func_get_args();
        $num_params = func_num_args();
        $funcion_constructor = '__construct'.$num_params;

        if($num_params>=2)
        {
            if (method_exists($this, $funcion_constructor)) {
                call_user_func_array(array($this, $funcion_constructor), $params);
            }
        }
        else
        {
            //Lanzar excepcion porque no cumple con la cantidad minima de parametros.
        }
        
    }

    private function __construct2(string $marca,string $color){
        $this->_marca=$marca;
        $this->_color=$color;
        $this->_precio=0;
        $this->_fecha=new DateTime('01/01/1900');
    }

    private function __construct3(string $marca,string $color,float $precio){
        $this->__construct2($marca,$color);
        $this->_precio=$precio;
    }

    private function __construct4(string $marca,string $color,string $precio,DateTime $fecha){
        $this->__construct3($marca,$color,$precio);
        $this->_fecha=$fecha;
    }

    function AgregarImpuestos(float $impuesto){
        $this->_precio += $impuesto;
    }

    static function MostrarAuto(Auto $a)
    {    
        echo  'Marca: ' . $a->_marca . '<br/>' .  'Color: ' . $a->_color . '<br/>' . 'Precio: ' . $a->_precio . '<br/>' . 'Fecha: ' . ($a->_fecha)->format('d-m-Y') . '<br/>';
    }

    function Equals (Auto $a)
    {
        $sonIguales = false;

        if($this->_marca == $a->_marca)
        {
            $sonIguales = true;    
        }

        return $sonIguales;
    }

    static function Add(Auto $a1, Auto $a2)
    {
        $retorno=0;

        if($a1->_marca == $a2->_marca && $a1->_color == $a2->_color)
        {
            $retorno = $a1->_precio + $a2->_precio;
        }

        return $retorno;

    }



}

  

