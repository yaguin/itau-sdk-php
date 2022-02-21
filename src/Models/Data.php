<?php namespace Itau\Models;

class Data
{
    /**
     *@var string diretorio onde se encontra os certificados
     */
    public $etapa_processo_boleto;

    /**
     *@var string nome do arquivo certificado .PFX
     */
    public $codigo_canal_operacao;

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
