<?php


namespace Edsp\Php\Models;


use Edsp\Php\Annotations\Email;
use Edsp\Php\Annotations\Text;

class Usuario extends EntidadeComNome
{
    #[Email(required: true)]
    public string $email;

    #[Text("Senha", required: true)]
    public string $senha;
}