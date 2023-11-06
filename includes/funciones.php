<?php

function debuguear($variable): string
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}
function s($html): string
{
    $s = htmlspecialchars($html);
    return $s;
}

function pagina_actual($path): bool
{
    return str_contains($_SERVER['PATH_INFO'], $path) ? true : false;
}

function esta_autenticado(): bool
{
    session_start();
    return isset($_SESSION['nombre']) && !empty($_SESSION); // retorna true o false
}

function es_admin(): bool
{
    session_start();
    return isset($_SESSION['admin']) && !empty($_SESSION['admin']);
}
