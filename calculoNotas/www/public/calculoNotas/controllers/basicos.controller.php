<?php

/*
 * Aquí hacemos los ejercicios y rellenamos el array de datos.
 */
$data['titulo'] = "Ejercicios Básicos";
//Ejercicio 1
$data["div_titulo1"] = "Ejercicio 1";
$data['ej1_x'] = 34;
$data['ej1_y'] = $data['ej1_x'] ** 2;

//Ejercicio 2
$data["div_titulo2"] = "Ejercicio 2";
$data['x'] = 30;
$data['y'] = 8;
$data['z'] = $data['x'] * $data['y'];
//Ejercicio 3
$data["div_titulo3"] = "Ejercicio 3";
$data['base'] = 2;
$data['altura'] = 4;
$data['area'] = $data['base'] * $data['altura'];
$data['perimetro'] = ($data['base'] *2 ) + ($data['altura'] *2);
//Ejercicio 4
$data["div_titulo4"] = "Ejercicio 4";
$data['nombre_alumno'] = "Ignacio Campiño Fernández";
$data['edad_alumno'] = 19;
$data['media_alumno'] = 8;
//Ejercicio 5
$data["div_titulo5"] = "Ejercicio 5";
$data['precio_noche_baja'] = 100;
$data['precio_noche_alta'] = 150;
$data['num_noches_alta'] = 10;
$data['num_noches_baja'] = 10;
$data['precios_noches_alta'] = $data['precio_noche_alta'] * $data['num_noches_alta'];
$data['precios_noches_baja'] = $data['precio_noche_baja'] * $data['num_noches_baja'];
//Ejercicio 6
$data["div_titulo6"] = "Ejercicio 6";
$data['radio_cir'] = 4;
$data['diametro_cir'] = 8;
$data['area_cir'] = number_format(round(pow($data['radio_cir'],2) * pi(),2),2,',','.');
$data['perimetro_cir'] = number_format(round($data['diametro_cir'] * pi(),2),2,',','.');
//Ejercicio 7
$data["div_titulo7"] = "Ejercicio 7";
$data['kmh'] = 10;
$data['ms'] = number_format(round($data['kmh'] * 5/18,2),2,',','.');
//Ejercicio 8
$data["div_titulo8"] = "Ejercicio 8";
$data['num_entero'] = 100;
$data['c'] = substr($data['num_entero'], 0, 1);
$data['d'] = substr($data['num_entero'], 1, 1);
$data['u'] = substr($data['num_entero'], 2, 1);
//Ejercicio 9
$data["div_titulo9"] = "Ejercicio 9";
$data['cad_texto'] = "Hola que tal?";
$data['cad_carac'] = strlen($data['cad_texto']);
$data['cad_pala'] = str_word_count($data['cad_texto']);

/*
 * Llamamos a las vistas
 */
include 'views/templates/header.php';
include 'views/basicos.view.php';
include 'views/templates/footer.php';