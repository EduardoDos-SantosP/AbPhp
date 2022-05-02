<?php


namespace Edsp\Php\Annotations;


use Attribute;

#[Attribute]
class Key extends FieldAnnotation
{
    public function __construct()
    {
        parent::__construct(null, true);

        $this->html = "
            <div>
                <input type='hidden'>
            </div>
        ";
    }
}