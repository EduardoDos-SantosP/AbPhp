<?php

function throwHandled(string $message): void
{
    throw new Exception($message);
}

function projectPath(): string
{
    return
        $_SERVER['DOCUMENT_ROOT']
        . '/'
        . explode(
            '/',
            trim(
                $_SERVER['REQUEST_URI'],
                '/'
            )
        )[0]
        . '/';
}

function debug(mixed $var, bool $die = false, bool $usePrintR = false): void
{
    $debug = $usePrintR ? 'print_r' : 'var_dump';
    echo '<pre>';
    $debug($var);
    echo '</pre>';
    if ($die) die();
}