<?php

namespace Itau\Models\Pix;

class Debtor
{
    /**
     * @var string string <= 200 caracteres
     * Nome do pagador da cobrança.
     * Necessário preencher o campo CNPJ ou o campo CPF.
     */
    public $nome;

    /**
     * @var string /^\d{11}$/
     * Número do Documento Cadastro de Pessoa Física.
     */
    public $cpf;

    /**
     * @var string /^\d{14}$/
     * Número do Cadastro Nacional da Pessoa Jurídica.
     */
    public $cnpj;

    public function build($data)
    {
        $this->nome = $data['name'];
        if (strlen($data['document']) == 11) {
            $this->cpf = $data['document'];
        } else {
            $this->cnpj = $data['document'];
        }
    }
}