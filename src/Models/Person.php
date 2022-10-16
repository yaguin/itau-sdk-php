<?php namespace Itau\Models;

class Person
{

    /**
     *@var string Nome/Razão social do pagador. Máximo caracteres: 50
     */
    public $nome_pessoa;

    /**
     *@var string Nome Fantasia do pagador - Obrigatório
     */
    public $nome_fantasia;

    /**
     *@var string Dados tipo pessoa do pagador
     */
    public $tipo_pessoa;

    public function __construct()
    {
        $this->tipo_pessoa = new PersonType();
    }

    public function build($personData)
    {
        $this->nome_pessoa = $personData['name'];
        $this->nome_fantasia = $personData['fantasy_name'];

        $this->tipo_pessoa->build($personData);
    }
}
