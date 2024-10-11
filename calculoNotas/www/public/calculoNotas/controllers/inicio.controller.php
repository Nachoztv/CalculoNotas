<?php
/*
 * Aquí hacemos los ejercicios y rellenamos el array de datos.
 */
$data['titulo'] = "Inicio";
$data['titulo_ignacio'] = "Calculo de Notas";
$data["div_titulo"] = "Página inicio Calculo de Notas";
$data['texto'] = "<p><strong>Trabajo Calculo Notas Ignacio</strong>.</p><p></p>";

/*
 * Llamamos a las vistas
 */
include 'views/templates/header.php';
include 'views/inicio.view.php';
include 'views/templates/footer.php';