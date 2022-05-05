<?php


namespace Edsp\Php\Annotations;


use Attribute;
use Edsp\Php\Views\View;

#[Attribute]
class Email extends FieldAnnotation
{
    public function __construct(?string $label = "E-mail", bool $required = false)
    {
        parent::__construct($label, $required);

        $this->html->addChild(
            new View("
                <label class='form-label'>$label</label>
                <input type='email' class='form-control'>
            ")
        );
    }
}