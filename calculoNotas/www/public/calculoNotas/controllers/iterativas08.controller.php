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
    //recorrerArray($json_array);
   $data['resultado'] = calculeArray($json_array);
}


    }
    //si bien procesar

    //si mal enviar
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
function recorrerArray($json_array){
    $keys = array_keys($json_array);
    $i = 0;
    while ($i < count($keys)) {
        $key = $keys[$i];
        $valor = $json_array[$key];
            if (is_array($valor)) {
                echo "Clave: $key";
                foreach ($valor as $subKey => $subValor) {
                    echo "  Subclave: $subKey, Valor: $subValor";
                }

            } else {
                echo "Clave: $subKey ,Valor: $subValor";
            }

        $i++;
        }

}
function calculeArray($json_array) : array
{

    $keys = array_keys($json_array);
    $i = 0;
    while ($i < count($keys)) {
        $key = $keys[$i];
        $valor = $json_array[$key];
        if (is_array($valor)) {
            //echo "Clave: $key";
            $aprobados = [];
            $suspensos = [];
            foreach ($valor as $subKey => $subValor) {
                //echo "Subclave: $subKey, Valor: $subValor";

                    if ($subValor < 5) {
                        $suspensos [] = $subValor;
                        $min_score = array_search(min($suspensos), $valor);

                    } else {
                        $aprobados [] = $subValor;
                        $max_score = array_search(max($aprobados), $valor);


                    }

            }
            /*//aprobados y suspensos
            echo "<br>";
            echo print_r($suspensos);
            echo "<br>";
            echo count($suspensos);
            echo "<br>";
            echo print_r($aprobados);
            echo "<br>";
            echo count($aprobados);
            echo "<br>";
            echo $max_score;
            echo "<br>";
            echo $min_score;
            echo "<br>";
*/
            //nota media
            $suma = array_sum($valor);
            $total = count($valor);
            $media = !empty($valor) ? $suma / $total : '-';;
            //var_dump($media);


        }
        $_resultado [$key]= [
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
            ]
        ];
        $i++;

    }
   return $_resultado;
}
include 'views/templates/header.php';
include 'views/iterativas08.view.php';
include 'views/templates/footer.php';