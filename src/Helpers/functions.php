<?php

function projectPath(): string {
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