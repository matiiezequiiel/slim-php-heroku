<?php
include_once 'Figura.php';

class Rectangulo extends FiguraGeometrica{

    private $_ladoUno;
    private $_ladoDos;

    public function __construct($l1,$l2)
    {
        parent::__construct();
        $this->CalcularDatos($l1,$l2);
    }

    protected function CalcularDatos($dato1,$dato2){
    
        $this->_perimetro = ($dato1 + $dato2 * 2);
        $this->_superficie = ($dato1 * $dato2);
    
    }

    public function __toString()
    {
        return parent::__toString() . $this->Dibujar();
    }

    public function Dibujar()
    {
        return "Color:" . $this->_color . "<br/>*******<br/>*******<br/>*******<br/>" ;
    }


}


?>