<?php

namespace Edsp\Php\Controllers;

use Edsp\Php\Models\Usuario;
use Edsp\Php\Views\View;
use Edsp\Php\Views\Page;

class UsuarioController extends Controller
{
    public function view(): Page
    {
        $page = parent::view();

        $page->getContent()->addChild(
            new View(
                implode(
                    "",
                    array_map(
                        fn($p) => $p->getAttributes()[0]->newInstance()->html,
                        (new \ReflectionObject(new Usuario()))->getProperties()
                    )
                )
            )
        );

        return $page->mount();
    }
}