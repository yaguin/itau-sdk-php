<?php namespace Itau\Models;

class Person
{

    /**
     *@var string diretorio onde se encontra os certificados
     */
    public $nome_pessoa;

    /**
     *@var string diretorio onde se encontra os certificados
     */
    public $tipo_pessoa;

    public function __construct()
    {
        $this->tipo_pessoa = new PersonType();
    }
}
