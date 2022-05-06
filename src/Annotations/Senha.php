<?php


namespace Edsp\Php\Annotations;

use Attribute;

#[Attribute]
class Senha extends InputAnnotation
{
    public function __construct(
        ?string $label = "Senha",
        bool    $required = true)
    {
        parent::__construct($label, $required, self::TYPE_PASSWORD);
    }
}