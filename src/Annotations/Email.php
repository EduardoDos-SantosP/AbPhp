<?php


namespace Edsp\Php\Annotations;


use Attribute;

#[Attribute]
class Email extends FieldAnnotation
{
    public function __construct(?string $label = "E-mail", bool $required = false)
    {
        parent::__construct($label, $required);

        $this->html = "
            <div class='form-group'>
                <label>$label</label>
                <input type='email'>
            </div>
        ";
    }
}