<?php


namespace Edsp\Php\Annotations;


use Attribute;
use Edsp\Php\Views\View;

#[Attribute]
class FieldAnnotation
{
    public ?string $label;
    public bool $required;
    public View $html;

    public function __construct(?string $label, bool $required = false)
    {
        $this->label = $label;
        $this->required = $required;
        $this->html = new View("<div class='form-group mt-3'>@[0]</div>");
    }
}