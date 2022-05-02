<?php


namespace Edsp\Php\Annotations;


use Attribute;

#[Attribute]
class Text extends FieldAnnotation
{
    public function __construct(?string $label, bool $required = false)
    {
        parent::__construct($label, $required);

        $this->html = "
            <div class='form-group'>
                <label>$label</label>
                <input type='text'>
            </div>
        ";
    }
}