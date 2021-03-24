<?php
/*
Aguirre Matias,
Aplicación Nº 5 (Números en letras)
Realizar un programa que en base al valor numérico de una variable $ num , pueda mostrarse
por pantalla, el nombre del número que tenga dentro escrito con palabras, para los números
entre el 20 y el 60.
Por ejemplo, si $num = 43 debe mostrarse por pantalla “cuarenta y tres”.
*/

    $num=39;
    $numeroLetras;

    switch((substr((string)$num,-2,1)))
    {
        case "2":
            if(substr((string)$num,-1)=="0")
            {
                $numeroLetras="Veinte";                
            } 
            else
            {
                $numeroLetras="Veinti";
            }
            break;
        case "3":
                $numeroLetras="Treinta";                
            break;
        case "4":      
                $numeroLetras="Cuarenta";                         
            break;
        case "5":
                $numeroLetras="Cincuenta";                
            break;
    }
    
    switch((substr((string)$num,-1)))
    {
        case "0":
            printf("%s",$numeroLetras);
            break;
        case "1":
            if(substr((string)$num,-2,1)=="2")
            printf("%s",$numeroLetras."uno.");
            else
            printf("%s",$numeroLetras." y uno.");
            break;         
        case "2":
            if(substr((string)$num,-2,1)=="2")
            printf("%s",$numeroLetras."dos.");
            else
            printf("%s",$numeroLetras." y dos.");
            break;
        case "3":
            if(substr((string)$num,-2,1)=="2")
            printf("%s",$numeroLetras."tres.");
            else
            printf("%s",$numeroLetras." y tres.");
            break;
        case "4":
            if(substr((string)$num,-2,1)=="2")
            printf("%s",$numeroLetras."cuatro.");
            else
            printf("%s",$numeroLetras." y cuatro.");
            break;
        case "5":
            if(substr((string)$num,-2,1)=="2")
            printf("%s",$numeroLetras."cinco.");
            else
            printf("%s",$numeroLetras." y cinco.");
            break;
        case "6":
            if(substr((string)$num,-2,1)=="2")
            printf("%s",$numeroLetras."seis.");
            else
            printf("%s",$numeroLetras." y seis.");
            break;
        case "7":
            if(substr((string)$num,-2,1)=="2")
            printf("%s",$numeroLetras."siete.");
            else
            printf("%s",$numeroLetras." y siete.");
            break;
        case "8":
            if(substr((string)$num,-2,1)=="2")
            printf("%s",$numeroLetras."ocho.");
            else
            printf("%s",$numeroLetras." y ocho.");
            break;
        case "9":
            if(substr((string)$num,-2,1)=="2")
            printf("%s",$numeroLetras."nueve.");
            else
            printf("%s",$numeroLetras." y nueve.");
            break;

    }


    echo "<br/>";


    




?>