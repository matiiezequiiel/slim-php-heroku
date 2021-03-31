<?php

    include_once './Class/Rectangulo.php';
    include_once './Class/Triangulo.php';

    $r = new Rectangulo(3,2);
    
    $t= new Triangulo(2,5);

    $r->setColor("Verde");
    $t->setColor("Naranja");

    echo $r;
    echo $t;


?>