<?php
/*
 * Aquí hacemos los ejercicios y rellenamos el array de datos.
 */
$data['titulo'] = "Ejercicios De Decisión";
//Ejercicio 1
$data["div_titulo1"] = "Ejercicio 1";
$data['num1'] = 4;
$data['num2'] = 2;
$data['esDiv'] = "";
if ($data['num1']%$data['num2']==0){
    $data['esDiv'] = "Si";
}else{
    $data['esDiv'] = "No";
}
//Ejercicio 2
$data["div_titulo2"] = "Ejercicio 2";
$data['num1'] = 4;
$data['num2'] = 2;
$data['num3'] = 6;
$data['resul']=0;
if ($data['num1']>$data['num2'] && $data['num1']>$data['num3']){
    $data['resul'] = $data['num1'];
    $data['num1'] ="<b>{$data['num1']}</b>";
}else if ($data['num2']>$data['num1'] && $data['num2']>$data['num3']){
    $data['resul'] = $data['num2'];
    $data['num2'] ="<b>{$data['num2']}</b>";
}else{
    $data['resul'] = $data['num3'];
    $data['num3'] ="<b>{$data['num3']}</b>";
}
//$array['array'] = array($data['num1'],$data['num2'],$data['num3']);
//$data['resul'] = max($array['array']);

//Ejercicio 3
$data["div_titulo3"] = "Ejercicio 3";
$data['seg'] = 264312;
$data['min']=round($data['seg'] / 60,2);
$data['hour']=round($data['seg'] / 3600,2);
$data['days']=round($data['seg'] / 86400,2);

//Ejercicio 4
$data["div_titulo4"] = "Ejercicio 4";
$data['ano'] = 2004;
$data['bisiesto']= "";
if($data['ano'] % 4 == 0){
    $data['bisiesto']="success";
}else{
    $data['bisiesto']="danger";
}

//Ejercicio 5
$data["div_titulo5"] = "Ejercicio 5";
$data["sueldo"]=10000;
if ($data["sueldo"] <= 1000){
    $data["descuento"] = $data["sueldo"] * (10/100);
    $data["neto"]= $data["sueldo"] - $data["descuento"];
}else if ($data["sueldo"]  > 1000 && $data["sueldo"] <= 2000){
    $data["descuento"] = $data["sueldo"] * (15/100);
    $data["neto"]= $data["sueldo"] - $data["descuento"];
}else{
    $data["descuento"] = $data["sueldo"] * (18/100);
    $data["neto"]= $data["sueldo"] - $data["descuento"];
}

//Ejercicio 6
$data["div_titulo6"] = "Ejercicio 6";
$data["nota"]=10;
if ($data["nota"] < 5){
    $data["cuali"]="Suspenso";
}elseif ($data["nota"] >= 5 && $data["nota"] < 6){
    $data["cuali"]="Aprobado";
}elseif ($data["nota"] >= 6 && $data["nota"] < 7){
    $data["cuali"]="Bien";
}elseif ($data["nota"] >= 7 && $data["nota"] < 8.75){
    $data["cuali"]="Notable";
}elseif ($data["nota"] >= 8.75 && $data["nota"] < 10){
    $data["cuali"]="Sobresaliente";
}else{
    $data["cuali"]="Matrícula";
}

//Ejercicio 7
$data["div_titulo7"] = "Ejercicio 7";
$data["bebida"]="Mondariz";
$data["tipoBebida"]="";
switch ($data["bebida"]) {
    case "Marcilla":
        $data["tipoBebida"]="cafe";
        break;
    case "Bonka":
        $data["tipoBebida"]="cafe";
        break;
    case "Coca-cola":
        $data["tipoBebida"]="refresco";
        break;
    case "Kas":
        $data["tipoBebida"]="refresco";
        break;
    case "Pepsi":
        $data["tipoBebida"]="refresco";
        break;
    case "Mondariz":
        $data["tipoBebida"]="agua";
        break;
    case "Cabreiroá":
        $data["tipoBebida"]="agua";
        break;
    case "Sousas":
        $data["tipoBebida"]="agua";
        break;
}
/*
 * Llamamos a las vistas
 */
include 'views/templates/header.php';
include 'views/decision.view.php';
include 'views/templates/footer.php';