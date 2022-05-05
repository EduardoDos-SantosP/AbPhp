<?php


namespace Edsp\Php\Annotations;


use Attribute;
use Edsp\Php\Views\View;

#[Attribute]
class Text extends FieldAnnotation
{
    public function __construct(?string $label, bool $required = false)
    {
        parent::__construct($label, $required);

        $this->html->addChild(
            new View("
                <label class='form-label'>$label</label>
                <div class='input-group'>
                    <input type='text' class='form-control'>
                    <span class='input-group-text'><i class='fas fa-times text-dark'></i></span>
                </div>
            ")
        );
    }
}