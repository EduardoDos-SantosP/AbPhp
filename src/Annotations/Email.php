<?php


namespace Edsp\Php\Annotations;


use Attribute;

#[Attribute]
class Email extends InputAnnotation
{
    public function __construct(?string $label = "E-mail", bool $required = false)
    {
        parent::__construct($label, $required, self::TYPE_EMAIL);
    }
}