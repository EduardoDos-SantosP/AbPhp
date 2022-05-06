<?php


namespace Edsp\Php\Annotations;


use Attribute;

#[Attribute]
class Text extends InputAnnotation
{
    public function __construct(?string $label, bool $required = false)
    {
        parent::__construct($label, $required);
    }
}