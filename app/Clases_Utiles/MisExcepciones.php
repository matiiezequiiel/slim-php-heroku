<?php

class MisExcepciones extends Exception{

    function BDException($mensaje){

        throw new Exception($mensaje);

    }


}





?>