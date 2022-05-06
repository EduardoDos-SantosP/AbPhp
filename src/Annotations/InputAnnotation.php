<?php

namespace Edsp\Php\Annotations;

use Edsp\Php\Views\View;
use ReflectionProperty;

class InputAnnotation extends FieldAnnotation
{
    public const TYPE_TEXT = 'text';
    public const TYPE_NUMBER = 'number';
    public const TYPE_EMAIL = 'email';
    public const TYPE_PASSWORD = 'password';

    public function __construct(
        ?string $label = null,
        bool    $required = false,
        string  $type = 'text',
        bool    $clearButton = true)
    {
        parent::__construct($label, $required);

        $label = is_null($label)
            ? ""
            : "<label class='form-label' for='@[0]'>$label</label>";

        $clearButton = is_null($clearButton)
            ? ""
            : "<span class='input-group-text'><i class='fas fa-times text-dark'></i></span>";

        $this->html = $this->html->addChild(new View("
            $label
            <div class='input-group'>
                <input type='$type' class='form-control' id='@[0]' name='@[0]'>
                $clearButton
            </div>
        "));
    }

    public function bindToModel(ReflectionProperty $modelProp): View
    {
        $this->html
            ->addChild(new View("$modelProp->name"));
        $this->html->mount();
        return $this->html;
    }
}