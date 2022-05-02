<?php


namespace Edsp\Php\Controllers;


use Edsp\Php\Views\Page;
use Edsp\Php\Views\View;

abstract class Controller
{
    public function view(): Page
    {
        $page = new Page();

        $content = new View("
            <div class='content container-fluid px-0 d-flex flex-column justify-content-center'>
                <header class='container-fluid shadow-sm'>
                    <h1 class='text-center'>Título</h1>
                </header>
                <div class='main-content container-sm mt-5 rounded-3 shadow'>
                    <form class='container my-3 flex-column'>
                        @[0]
                        <div class='form-footer d-flex justify-content-end'>
                            <button type='submit' class='btn bg-primary'>Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        ");

        $page->setTitle('Home');
        $page->setContent($content);

        return $page->mount();
    }
}