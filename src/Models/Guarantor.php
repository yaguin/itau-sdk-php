<?php namespace Itau\Models;

class Guarantor
{
    /**
     * @var Person
     */
    public $pessoa;

    /**
     * @var Address
     */
    public $endereco;

    public function __construct()
    {
        $this->pessoa = new Person();
        $this->endereco = new Address();
    }

    public function build($person)
    {
        $this->pessoa->build($person);
        $this->endereco->build($person['address']);
    }
}
