<?php namespace Itau\Models;

class PersonType
{
    /**
     *@var string Tipo de pessoa do pagador Pessoa Física - 'F' Pessoa Jurídica - 'J'
     */
    public $codigo_tipo_pessoa;

    /**
     *@var string CPF do pagador - Obrigatório caso tipo_pessoa = F Exemplo: 12345678910
     */
    public $numero_cadastro_pessoa_fisica;

    /**
     *@var string CNPJ do pagador - Obrigatório caso tipo_pessoa = J Exemplo: 12312312000110
     */
    public $numero_cadastro_nacional_pessoa_juridica;

    public function build($personTypeData)
    {
        $this->codigo_tipo_pessoa = $personTypeData['type'];
        if ($this->codigo_tipo_pessoa == 'F') {
            $this->numero_cadastro_pessoa_fisica = $personTypeData['document'];
        } else {
            $this->numero_cadastro_nacional_pessoa_juridica = $personTypeData['document'];
        }
    }
}
