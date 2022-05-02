<?php


namespace Edsp\Php\Annotations;


use Attribute;

#[Attribute]
class FieldAnnotation
{
    public ?string $label;
    public bool $required;
    public string $html;

    public function __construct(?string $label, bool $required = false)
    {
        $this->label = $label;
        $this->required = $required;
    }
}