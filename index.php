<?php

require_once 'vendor/autoload.php';
require_once 'src/Helpers/functions.php';

use Edsp\Php\Controllers\UsuarioController;

(new UsuarioController())->view()->render();
