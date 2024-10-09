<?php

declare(strict_types=1);
$data = [];
if (isset($_POST['enviar'])) {
    //comprobar
    $data['input_texto'] = filter_var($_POST["texto"], FILTER_SANITIZE_SPECIAL_CHARS);
    $errors = checkform($_POST);
    if (count($errors) > 0) {
        $data['errors'] = $errors;

    } else {
        //Procesamos
        $data['contabilizado'] = countLetters($_POST['texto']);
    }
    //si bien procesar

    //si mal enviar
}
function checkform(array $data): array
{
    $errors = [];
    if (empty($data['texto'])) {
        $errors['texto'] = 'Inserte un valor en este campo';
  }
    return $errors;
}

function countLetters(string $txt): array
{
    $resultado = [];

    $textoLimpio = preg_replace("/[\P{L}]/u", '', $txt);

    $textoLimpio = mb_strtolower($textoLimpio);

    for ($i = 0; $i < mb_strlen($textoLimpio); $i++) {
        $caracter = mb_strtolower(mb_substr($textoLimpio, $i, 1));
            if (!isset($resultado[$caracter])) {
                $resultado[$caracter] = 1;
            }else{
                $resultado[$caracter]++;
        }
    }
    arsort($resultado);
    return $resultado;
}
include 'views/templates/header.php';
include 'views/iterativas04.view.php';
include 'views/templates/footer.php';