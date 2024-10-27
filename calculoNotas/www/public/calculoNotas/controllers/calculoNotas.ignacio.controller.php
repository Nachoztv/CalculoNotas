<?php
declare(strict_types=1);
$data = [];
if (isset($_POST['enviar'])) {
    $data['errors']= checkForm($_POST['json']);
    $data['input']['json'] = filter_var($_POST['json'], FILTER_SANITIZE_SPECIAL_CHARS);

if (empty($data['errors'])) {
    $json_array = json_decode($_POST["json"], true);
    $data['resultado'] = calculeArray($json_array);
}else{
    $data['errors']['json'] = $data['errors'];
}


    }
function checkForm(string $json) : array
{
    $errors = [];
    if(empty($json))
    {
        $errors['json'][] = 'Inserte un json a analizar';
    }
    else{
        $json_array = json_decode($json, true);
        if(is_null($json_array))
        {
            $errors['json'][] = 'El texto introducido no es un JSON bien formado';
        }
        else
        {
            if(!is_array($json_array)){
                $errors['json'][] = 'El Json no contiene un array de materias';
            }
            else{
                foreach($json_array as $asignatura => $alumnos)
                {
                    if(!is_string($asignatura) || mb_strlen(trim($asignatura)) < 1){
                        $errors['json'][] = "'$asignatura' no es un nombre de asignatura válido";
                    }
                    if(!is_array($alumnos)){
                        $errors['json'][] = "'$asignatura' no contiene un array de alumnos";
                    }else if (empty($alumnos)){

                        $errors['json'][] = "La asignatura '$asignatura' no tiene alumnos";
                    }
                    else{
                        foreach($alumnos as $alumno => $notas) {
                            if (!is_string($alumno) || mb_strlen(trim($alumno)) < 1) {
                                $errors['json'][] = "El alumno '$alumno' de la asignatura '$asignatura' no es un nombre de alumno válido";
                            }
                            if (empty($notas)) {
                                $errors['json'][] = "'$alumno' no contiene un array de notas en la asignatura '$asignatura'";
                            }else {
                                foreach ($notas as $nota) {
                                    if (!is_numeric($nota)) {
                                        $errors['json'][] = "La nota '$nota' del alumno '$alumno' en la asignatura '$asignatura' no es un número";
                                    } else if ($nota < 0 || $nota > 10) {
                                        $errors['json'][] = "La nota '$nota' del alumno '$alumno' en la asignatura '$asignatura' no tiene un valor entre 0 y 10";
                                    }
                                }
                            }
                        }

                    }
                }
            }
        }
    }
    return $errors;
}

function calculeArray($json_array) : array
{
    $suspensos_nombre = [];
    $aprobados_nombre = [];
    $suspensos_conteo = [];
    $_resultado = [];
    foreach ($json_array as $asignatura => $alumnos) {
        $aprobados = [];
        $suspensos = [];
        foreach ($alumnos as $nombre => $notas) {
            $suma = array_sum($notas);
            $total = count($notas);
            $media = !empty($notas) ? $suma / $total : '-';

            if (!isset($suspensos_conteo[$nombre])) {
                $suspensos_conteo[$nombre] = 0;
            }

            if ($media < 5) {
                $suspensos [] = $media;
                if (!in_array($nombre, $suspensos_nombre)) {
                    $suspensos_nombre [] = $nombre;

                }
                $suspensos_conteo[$nombre]++;


            } else {
                $aprobados [] = $media;
                if (!in_array($nombre, $aprobados_nombre) && !in_array($nombre, $suspensos_nombre)) {
                    $aprobados_nombre [] = $nombre;
                }

            }
        }
        $min_score =  array_search(min($alumnos), $alumnos);
        $max_score =  array_search(max($alumnos), $alumnos);

        $media_asignatura =count($alumnos) > 0 ?  array_sum(array_merge($aprobados, $suspensos)) / count($alumnos): '-';

        $apruebanTodo = [];
        $hanSuspendido = [];
        $noPromocionan = [];
        $promocionan = [];

        foreach ($suspensos_conteo as $alumno => $num_suspensos) {
            if ($num_suspensos === 0) {
                $apruebanTodo[] = $alumno;
                $promocionan [] = $alumno;
            } else {
                $hanSuspendido[] = $alumno;
                if ($num_suspensos <= 1) {
                    $promocionan [] = $alumno;
                }
                if ($num_suspensos > 1) {
                    $noPromocionan[] = $alumno;
                }
            }
        }



        $_resultado [$asignatura] = [
            'media' => $media_asignatura,
            'suspensos' => count($suspensos),
            'aprobados' => count($aprobados),
            'max' => [
                'alumnos' => $max_score,
                'notas' => !empty($aprobados) ? round(max($aprobados),2): round(min($suspensos),2)
            ],
            'min' => [
                'alumnos' => $min_score,
                'notas' => !empty($suspensos) ? round(min($suspensos),2): round(max($aprobados),2)
            ],
            'todo_aprobado' => $apruebanTodo,
            'alumnos_asignatura_suspensa' => $hanSuspendido,
            'alumnos_promocionan' => $promocionan,
            'alumnos_no_promocionan' => $noPromocionan
        ];

    }
   return $_resultado;
}

include 'views/templates/header.php';
include 'views/calculoNotas.ignacio.view.php';
include 'views/templates/footer.php';