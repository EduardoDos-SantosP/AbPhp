<?php


namespace Edsp\Php\Controllers;


use Edsp\Php\Annotations\FieldAnnotation;
use Edsp\Php\Views\Page;
use Edsp\Php\Views\View;
use Illuminate\Support\Collection;
use ReflectionAttribute;
use ReflectionClass;
use ReflectionObject;
use ReflectionProperty;

abstract class Controller
{
    public const CONTROLLER_NAME_SUFFIX = 'Controller';

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
                        <hr>
                        <div class='form-footer d-flex justify-content-end mt-2'>
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

    protected function mountView(Controller $controller): Page
    {
        $page = self::view();

        $html = '';
        foreach ($this->getModelFieldsBase($controller) as $htmlField)
            $html .= $htmlField;

        $page->getContent()->addChild(new View($html));

        return $page->mount();
    }

    protected function getModelNameBase(Controller $controller): string
    {
        return substr(
            (new ReflectionObject($controller))->getShortName(),
            0,
            -strlen(self::CONTROLLER_NAME_SUFFIX)
        );
    }

    protected function getModelFieldsBase(Controller $controller): Collection
    {
        $modelName = 'Edsp\\Php\\Models\\' . $this->getModelNameBase($controller);
        if (!class_exists($modelName))
            throwHandled("A classe '$modelName' não foi encontrada!");

        $modelProps = collect((new ReflectionClass($modelName))->getProperties());

        return $modelProps
            ->map(
                function (ReflectionProperty $p) {
                    return
                        collect($p->getAttributes())
                            ->map(fn(ReflectionAttribute $a) => $a->newInstance())
                            ->first(fn(object $a) => is_a($a, FieldAnnotation::class));
                }
            )
            ->filter()
            ->map(fn(FieldAnnotation $a) => $a->html->toString());
    }
}