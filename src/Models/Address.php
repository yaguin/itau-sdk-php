<?php namespace Itau\Models;

class Address
{
    /**
     *@var string Nome do logradouro, número, complemento. Máximo caracteres: 45.
     */
    public $nome_logradouro;

    /**
     *@var string Nome do bairro. Máximo caracteres: 15.
     */
    public $nome_bairro;

    /**
     *@var string Nome da cidade. Máximo caracteres: 20.
     */
    public $nome_cidade;

    /**
     *@var string Sigla da UF. Máximo caracteres: 2.
     */
    public $sigla_UF;

    /**
     *@var string CEP. Máximo caracteres: 8.
     */
    public $numero_CEP;

    public function build($addressData)
    {
        $this->nome_logradouro = $addressData['street'];
        $this->nome_bairro = $addressData['neighborhood'];
        $this->nome_cidade = $addressData['city'];
        $this->sigla_UF = $addressData['uf'];
        $this->numero_CEP = $addressData['cep'];
        return $this;
    }
}
