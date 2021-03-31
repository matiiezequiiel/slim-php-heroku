<?php

include_once 'Figura.php';

class Triangulo extends FiguraGeometrica{

    private $_altura;
    private $_base;

    public function __construct($b,$h)
    {
        parent::__construct();
        $this->CalcularDatos($b,$h);
    }

    protected function CalcularDatos($b,$h)
    {
        
        $this->_perimetro = $b + ($h * 2);
        $this->_superficie = ($b * $h) / 2;
        
    }

    public function __toString()
    {
        return parent::__toString() . "<br/>" . $this->Dibujar();
    }


    public function Dibujar()
    {
        return "Color:" . $this->_color . "<br/>*<br/>  ***<br/>*****<br/>" ;
    }

}



?>