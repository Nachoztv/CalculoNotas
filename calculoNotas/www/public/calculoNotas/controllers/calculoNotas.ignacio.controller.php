<?php

declare(strict_types=1);
$data = [];
if (isset($_POST['enviar'])) {
    //comprobar

    $errors= checkform($_POST);
    $data['input_json'] = filter_var($_POST['json'], FILTER_SANITIZE_SPECIAL_CHARS);

if (count($errors) > 0) {
    $data['errors'] = $errors;
}else{
    $json_array = json_decode($_POST["json"],true);
   $data['resultado'] = calculeArray($json_array);
}

    }

function checkform(array $data): array
{
    $errors = [];
    $json_array = json_decode($_POST["json"],true);
    if (empty($json_array)) {
        $errors['json'] = 'Inserte un valor en este campo';
    }elseif (is_null($json_array)) {
        $errors['json'] = 'Inserte un array en este campo';
    }elseif (!is_array($json_array)) {
        $errors['json'] = 'Inserte un array en este campo';
    }else {
        $erroresFormato=[];
        foreach ($json_array as $asignatura => $alumnos) {
            if (!is_string($asignatura) || mb_strlen($asignatura) < 1) {
                $erroresFormato[]="'$asignatura' no es un nombre de asignatura válido";
            }
            if (!is_string($alumnos)) {
                $erroresFormato[]= "'$asignatura' no contiene un array de alumnos";
            }else{
                foreach ($alumnos as $alumno => $nota) {
                    if (!is_string($alumno) || mb_strlen($alumno) < 1) {
                        $erroresFormato[] ="El alumno'$alumno' de la asignatura '$asignatura' no es un nombre de alumno válido";
                    }
                    if (!is_numeric($nota)){
                        $erroresFormato[]="'$nota' no es un numero";
                    }elseif ($nota < 0 || $nota > 10){
                        $erroresFormato[]="La nota '$nota' del almuno '$alumno en la asignatura '$asignatura'";
                    }

                }if (!empty($erroresFormato)) {
                    $errors['json'] = $erroresFormato;
            }
            }
        }
    }
    return $errors;
}
function calculeArray($json_array) : array
{
    $keys = array_keys($json_array);
    $i = 0;

    $promocionan = [];
    $no_promocionan = [];
    $suspensos_nombre=[];
    $aprobados_nombre=[];
    $suspensos_conteo = [];
    $_resultado = [];
    while ($i < count($keys)) {
        $key = $keys[$i];
        $valor = $json_array[$key];
        if (is_array($valor)) {
            $aprobados = [];
            $suspensos = [];

            foreach ($valor as $subKey => $subValor) {
                if ($subValor < 5) {
                    if (!isset($suspensos_conteo[$subKey])) {
                        $suspensos_conteo[$subKey] = 0;
                    }
                    $suspensos [] = $subValor;
                    if (!in_array($subKey, $suspensos_nombre)) {
                        $suspensos_nombre [] = $subKey;

                    }
                    if (!isset($susspensos_conteo[$subKey])) {
                        $susspensos_conteo[$subKey] = 0;
                    }
                    $suspensos_conteo[$subKey] ++;
                    $min_score = array_search(min($suspensos), $valor);

                } else {
                    $aprobados [] = $subValor;
                    if (!in_array($subKey, $aprobados_nombre) && !in_array($subKey, $suspensos_nombre)) {
                        $aprobados_nombre [] = $subKey;
                    }
                    $max_score = array_search(max($aprobados), $valor);
                }
            }
        }

        $suma = array_sum($valor);
        $total = count($valor);
        $media = !empty($valor) ? $suma / $total : '-';;


        foreach ($suspensos_conteo as $alumno => $num_suspensos) {
            if ($num_suspensos >= 2) {
                if (!in_array($alumno, $no_promocionan)) {
                    $no_promocionan[] = $alumno;
                }
            }
        }

        foreach ($valor as $subKey => $subValor) {
                if (!in_array($subKey, $no_promocionan)) {
                    $promocionan[] = $subKey;
            }
        }


        $_resultado [$key] = [
            'media' => $media,
            'suspensos' => count($suspensos),
            'aprobados' => count($aprobados),
            'max' => [
                'alumnos' => $max_score,
                'notas' => max($aprobados)
            ],
            'min' => [
                'alumnos' => $min_score,
                'notas' => min($suspensos)
            ],
            'todo_aprobado' => array_diff($aprobados_nombre, $suspensos_nombre),
            'alumnos_asignatura_suspensa' => $suspensos_nombre,
            'alumnos_promocionan' => array_unique($promocionan),
            'alumnos_no_promocionan' =>array_unique($no_promocionan)
        ];
        $i++;

    }
   return $_resultado;
}

include 'views/templates/header.php';
include 'views/calculoNotas.ignacio.view.php';
include 'views/templates/footer.php';