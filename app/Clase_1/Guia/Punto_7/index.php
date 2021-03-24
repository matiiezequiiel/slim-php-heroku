<?php
/*
Aguirre Matias,
Aplicación Nº 7 (Mostrar impares)
Generar una aplicación que permita cargar los primeros 10 números impares en un Array.
Luego imprimir (utilizando la estructura for ) cada uno en una línea distinta (recordar que el
salto de línea en HTML es la etiqueta < br/> ). Repetir la impresión de los números utilizando
las estructuras while y f oreach .
*/



    $vec=array();
    $numero;
    $i=0;

    while($i<10){

        $numero=rand(0,999999);

        if($numero%2 != 0){
            $vec[$i]=$numero;
            $i++;
        }

    }

    for ($i=0; $i < 10; $i++) { 
        printf("Muestro con FOR: %d",$vec[$i]);
        echo "<br/>";
    }

    echo "<br/>";

    foreach ($vec as $value) {
        printf("Muestro con FOREACH: %d",$value);
        echo "<br/>";
    }

    echo "<br/>";

    $i=0;

    while($i<10){

        printf("Muestro con WHILE: %d",$vec[$i]);
        echo "<br/>";
        $i++;
    }

    
?>