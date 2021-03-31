<?php


 abstract class FiguraGeometrica{

    protected $_color;
    protected $_perimetro;
    protected $_superficie;

    public function __construct($color="Sin color",$perimetro=0,$superficie=0)
    {
        $this->_color = $color;
        $this->_perimetro = $perimetro;
        $this->_superficie = $superficie;

    }

    public function getColor()
    {
        return $this->_color;
    }

    public function setColor($valor)
    {
        if(is_string($valor)){

            $this->_color = $valor;
        }                       
    }

    public function __toString()
    {
        return "DATOS FIGURA:<br/>Color: " . $this->_color . "<br/> Perimetro: " . $this->_superficie . "<br/>Superficie: " . $this ->_superficie . "<br/>" ;
       
    }
    

    public abstract function Dibujar();
    
    protected abstract function CalcularDatos($dato1,$dato2); 
}

?>