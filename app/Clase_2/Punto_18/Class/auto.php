<?php
class Auto{

    private $_color;
    private $_precio;
    private $_marca;
    private $_fecha;

    public function __construct($_color,$_precio,$_marca,$_fecha)
    {
        $this->_color= $_color;
        $this->_precio= $_precio;
        $this->_marca= $_marca;
        $this->_fecha= $_fecha;
    }

}