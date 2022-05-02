<?php


namespace Edsp\Php\Models;


use Edsp\Php\Annotations\Text;

abstract class EntidadeComNome extends Entidade
{
    #[Text("Nome", true)]
    public string $nome;
}