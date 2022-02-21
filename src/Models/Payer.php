<?php namespace Itau\Models;

class Payer
{

    /**
     *@var string diretorio onde se encontra os certificados
     */
    public $pessoa;

    /**
     *@var string diretorio onde se encontra os certificados
     */
    public $endereco;

    public function __construct()
    {
        $this->pessoa = new Person();
        $this->endereco = new Address();
    }
}
