<?php
/*
Aguirre Matias,
Aplicación Nº 4 (Calculadora)
Escribir un programa que use la variable $ operador que pueda almacenar los símbolos
matemáticos: ‘ + ’, ‘ - ’, ‘ / ’ y ‘ * ’; y definir dos variables enteras $ op1 y $ op2 . De acuerdo al
símbolo que tenga la variable $operador, deberá realizarse la operación indicada y mostrarse el
resultado por pantalla.
*/


    $operador='/';
    $op1=5;
    $op2=6;

    switch($operador){
        case '+':
            printf("Resultado de suma: %d", ($op1+$op2));
            break;
        case '-':
            printf("Resultado de la resta: %d", $op1-$op2);            
            break;
        case '*':
            printf("Resultado de multiplicacion: %d", $op1*$op2);
            break;
        case '/':
            if($op2==0)
            {
                printf("No se puede dividir por 0");
            }
            else{
                printf("Resultado de la division: %.2f", $op1/$op2);
            }
            break;
    }



    echo "<br/>";


    




?>