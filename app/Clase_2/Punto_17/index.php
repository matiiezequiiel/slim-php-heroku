<?php

require_once './Class/auto.php';

//1
$a1=new Auto("Audi","Rojo");
$a2=new Auto("Audi","Verde");

//2
$a3=new Auto("VW","Verde",150);
$a4=new Auto("VW","Verde",200);

//3
$a5=new Auto("Fiat","Celeste", 300 , new DateTime());

//4
$a5->AgregarImpuestos(1500);    
$a4->AgregarImpuestos(1500);    
$a3->AgregarImpuestos(1500);    

//5
echo '<br/>';
echo Auto::Add($a1,$a2);
echo '<br/>';
//6
if($a1->Equals($a2))
{
    echo "Son iguales";
}
else
{
    echo "No son iguales";
}
echo '<br/>';

if($a1->Equals($a5))
{
    echo "Son iguales";
}
else
{
    echo "No son iguales";
}
echo '<br/>';

//7

Auto::MostrarAuto($a1);
Auto::MostrarAuto($a3);
Auto::MostrarAuto($a5);

?>