<?php

namespace Edsp\Php\Models;

use Edsp\Php\Annotations\Email;
use Edsp\Php\Annotations\Senha;

class Usuario extends EntidadeComNome
{
    #[Email(required: true)]
    public string $email;

    #[Senha]
    public string $senha;
}