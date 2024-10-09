<?php
declare(strict_types=1);
$data = [];
if (!empty($_POST)) {
    //comprobar
    $errors = checkform($_POST);
    $data['input_numeros'] = filter_var($_POST["numeros"], FILTER_SANITIZE_SPECIAL_CHARS);
    if (count($errors) > 0) {
        $data['errors'] = $errors;

    }else{
        //Procesamos
        $i = 0;
        $combo = explode("|", $_POST['numeros']);
        foreach ($combo as $fila) {
            $aux = explode(",", $fila);
            sort($aux);
            $alm[] = implode(",", $aux);

        }
        $data['ordenado'] = implode("|", $alm);
        var_dump($data['ordenado']);
    }
    //si bien procesar

    //si mal enviar
}
function checkform(array $data) : array
{
    $errors = [];
    if (empty($data['numeros'])) {
        $errors['numeros'] = 'Inserte un valor en este campo';
    }else{
        $combo = explode("|", $data['numeros']);
        $i = 0;
        $hayError = false;
        foreach ($combo as $combo) {
            $aux = explode(",", $combo);
            while ($i < count($aux) && !$hayError) {
                if (!is_numeric($aux[$i])) {
                    $hayError = true;
                }
                $i++;
            }

        }
        if ($hayError) {
            $errors['numeros'] = 'Solo se permiten numeros , comas, barras.';
        }
    }
    return $errors;
}
include 'views/templates/header.php';
include 'views/iterativas03.view.php';
include 'views/templates/footer.php';