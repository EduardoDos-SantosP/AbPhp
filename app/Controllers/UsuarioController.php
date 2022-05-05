<?php

namespace Edsp\Php\Controllers;

use Edsp\Php\Views\Page;

class UsuarioController extends Controller
{
    public function view(): Page
    {
        return parent::mountView($this);
    }
}