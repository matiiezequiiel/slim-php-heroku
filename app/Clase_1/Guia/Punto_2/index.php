<?php
/*
Aguirre Matias,
Aplicación Nº 2 (Mostrar fecha y estación)
Obtenga la fecha actual del servidor (función date ) y luego imprímala dentro de la página con
distintos formatos (seleccione los formatos que más le guste). Además indicar que estación del
año es. Utilizar una estructura selectiva múltiple.
*/



    printf("Fecha actual: %s",date(DateTimeInterface::COOKIE));
   
    
    echo "<br/>";

    switch(date("m"))
    {
         case 1: case 2: case 3: case 12:
            print("Estamos en verano");
        break;
        
        case 4:  case 5:  case 6:
            print("Estamos en otoño");
        break;

        case 7: case 8: case 9:
            print("Estamos en invierno");
        break;
        
        case 10: case 11:
            print("Estamos en primavera");
        break;
        
    }
   

    echo "<br/>";
    




?>