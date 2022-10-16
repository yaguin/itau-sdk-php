<?php namespace Itau\Models;

class Data
{
    /**
     *@var string Simulação de Emissão - 'simulacao’ e Emissão - 'efetivacao'
     */
    public $etapa_processo_boleto;

    /**
     * Certificate.
     *
     * @var
     */
    public $beneficiario;

    /**
     * Certificate.
     *
     * @var
     */
    public $dado_boleto;

    public function __construct()
    {
        $this->beneficiario = new Recipient();
        $this->dado_boleto = new BilletData();
    }
}
