<?php
/*
Aguirre Matias,
Aplicación Nº 1 (Sumar números)
Confeccionar un programa que sume todos los números enteros desde 1 mientras la suma no
supere a 1000. Mostrar los números sumados y al finalizar el proceso indicar cuantos números
se sumaron.
*/

$numero=0;
$acumulado=0;
$cantSumas=0;

while($acumulado<1000)
{
    $numero +=1;
    $acumulado += $numero;
    if($acumulado>=1000)
    break;
    $cantSumas++;
    
  
    printf("Numeros sumados: $acumulado");
    echo "<br/>";
    
}

printf("Cantidad de numeros sumados:%d \n",$cantSumas);

?>