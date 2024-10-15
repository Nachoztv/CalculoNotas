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
                    }
                    else{
                        foreach($alumnos as $alumno => $nota){
                            if(!is_string($alumno) || mb_strlen(trim($alumno)) < 1){
                                $errors['json'][] = "El alumno '$alumno' de la asignatura '$asignatura' no es un nombre de alumno válido";
                            }
                            if(!is_numeric($nota)){
                                $errors['json'][] = "La nota '$nota' del alumno '$alumno' en la asignatura '$asignatura' no es un número";
                            }
                            else if($nota < 0 || $nota > 10)
                            {
                                $errors['json'][] = "La nota '$nota' del alumno '$alumno' en la asignatura '$asignatura' no tiene un valor entre 0 y 10";
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
    $keys = array_keys($json_array);
    $i = 0;
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
                if (!isset($suspensos_conteo[$subKey])) {
                    $suspensos_conteo[$subKey] = 0;
                }
                if ($subValor < 5) {
                    $suspensos [] = $subValor;
                    if (!in_array($subKey, $suspensos_nombre)) {
                        $suspensos_nombre [] = $subKey;

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

        $apruebanTodo = [];
        $hanSuspendido = [];
        $noPromocionan = [];
        $promocionan = [];


        foreach ($suspensos_conteo as $alumno => $num_suspensos) {
            if($num_suspensos === 0){
                $apruebanTodo[] = $alumno;
                $promocionan [] = $alumno;
            }
            else{
                $hanSuspendido[] = $alumno;
                if ($num_suspensos <= 1) {
                    $promocionan [] = $alumno;
                }
                if($num_suspensos > 1){
                    $noPromocionan[] = $alumno;
                }
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
            'todo_aprobado' => $apruebanTodo,
            'alumnos_asignatura_suspensa' => $hanSuspendido,
            'alumnos_promocionan' => $promocionan,
            'alumnos_no_promocionan' =>$noPromocionan
        ];
        $i++;

    }
   return $_resultado;
}

include 'views/templates/header.php';
include 'views/calculoNotas.ignacio.view.php';
include 'views/templates/footer.php';