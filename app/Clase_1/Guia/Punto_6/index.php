<?php
/*
Aguirre Matias,
Aplicación Nº 6 (Carga aleatoria)
Definir un Array de 5 elementos enteros y asignar a cada uno de ellos un número (utilizar la
función r and ). Mediante una estructura condicional, determinar si el promedio de los números
son mayores, menores o iguales que 6. Mostrar un mensaje por pantalla informando el
resultado.
*/

    $vec=array();
    $acumulado=0;

    for ($i=0; $i < 5; $i++) { 
        $vec[$i]=rand(0,10);
        $acumulado+=$vec[$i];
    }

    if(($acumulado/$i) > 6)
    {
        printf("%d",$acumulado/$i);    
        echo "<br/>";
    }

    


    




?>