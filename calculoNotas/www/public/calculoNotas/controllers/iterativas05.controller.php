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
        $data['contabilizado'] = countWords($_POST['texto']);
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

function countWords(string $txt): array
{
    $resultado = [];

    $textoLimpio = preg_replace("/[\P{L}]/u", '', $txt);

    $textoLimpio = mb_strtolower($textoLimpio);


        if (preg_match_all("/\b[\p{L}\p{M}]+\b/u", $txt, $matches)) {
            foreach ($matches[0] as $word) {
                if (!isset($resultado[$word])) {
                    $resultado[$word] = 1;
                } else {
                    $resultado[$word]++;
                }
            }
        }
        arsort($resultado);
        return $resultado;
}
include 'views/templates/header.php';
include 'views/iterativas05.view.php';
include 'views/templates/footer.php';