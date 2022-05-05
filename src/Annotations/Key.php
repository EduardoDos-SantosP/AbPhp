<?php


namespace Edsp\Php\Annotations;


use Attribute;
use Edsp\Php\Views\View;

#[Attribute]
class Key extends FieldAnnotation
{
    public function __construct()
    {
        parent::__construct(null, true);

        $this->html = new View("
            <div>
                <input type='hidden'>
            </div>
        ");
    }
}