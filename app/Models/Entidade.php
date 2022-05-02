<?php


namespace Edsp\Php\Models;


use Edsp\Php\Annotations\Key;

abstract class Entidade
{
    #[Key]
    public int $id = 0;
}