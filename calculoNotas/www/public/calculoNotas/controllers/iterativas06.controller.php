<?php

declare(strict_types=1);
$data = [];
if (isset($_POST['enviar'])) {
    //comprobar
    $errors = checkform($_POST);
    $data['input_numero'] = filter_var($_POST["numero"]??'', FILTER_SANITIZE_SPECIAL_CHARS);
    if (count($errors) > 0) {
        $data['errors'] = $errors;

    } else {
        //Procesamos
        $numero = intval($_POST["numero"] ?? 0);
        $data['contabilizado'] = cribaErastotenes($numero);
    }
    //si bien procesar

    //si mal enviar
}
function checkform(array $data): array
{
    $errors = [];
    if (empty($data['numero'])) {
        $errors['numero'] = 'Inserte un valor en este campo';
    }elseif(!filter_var($data['numero'], FILTER_VALIDATE_INT)){
        $errors['numero'] = 'Inserte un valor valido';
    }elseif ((int) $data['numero'] < 2) {
        $errors['numero'] = 'El numero insertado debe ser mayor que 2';
    }
    return $errors;
}

function cribaErastotenes(int $numero): array
{
    $numeros = range(2,(int)$numero);
    $multiplos = [];
    for ($i=2; $i ** 2 <= (int) $numeros; $i++) {
        for ($j=2; $j * $i< $i+2; $j++) {
            $multiplos[] = $i * $j;
        }
    }
    return array_diff($numeros, $multiplos);
   /* for ($i = 2; $i <= $numero; $i++) {
            $inicial[] = $i;
        }
    var_dump($inicial);
    for ($i = 2; $i <= $numero; $i++) {
        if ($i % 2 == 0) {
            $multiplos[] = $i;
        }
    }
    var_dump($multiplos);
    $eliminarMultiplos = array_diff($inicial, $multiplos);
    var_dump($eliminarMultiplos);
    for ($i = 3; $i <= $numero; $i++) {
        if ($i % 3 == 0) {
            $multiplos2[] = $i;
        }

    }
    var_dump($multiplos2);
    $eliminarMultiplos2 = array_diff($inicial, $multiplos2);
    var_dump($eliminarMultiplos2);*/


}
include 'views/templates/header.php';
include 'views/iterativas06.view.php';
include 'views/templates/footer.php';