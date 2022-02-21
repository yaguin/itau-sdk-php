<?php namespace Itau\Models;

class BilletData
{
    /**
     *@var string diretorio onde se encontra os certificados
     */
    public $descricao_instrumento_cobranca;

    /**
     *@var string diretorio onde se encontra os certificados
     */
    public $forma_envio;

    /**
     *@var string diretorio onde se encontra os certificados
     */
    public $tipo_boleto;

    /**
     *@var string diretorio onde se encontra os certificados
     */
    public $codigo_carteira;

    /**
     *@var string diretorio onde se encontra os certificados
     */
    public $codigo_especie;

    /**
     *@var string diretorio onde se encontra os certificados
     */
    public $codigo_tipo_vencimento;

    /**
     *@var string diretorio onde se encontra os certificados
     */
    public $valor_total_titulo;

    /**
     *@var string diretorio onde se encontra os certificados
     */
    public $texto_seu_numero;

    /**
     *@var bool diretorio onde se encontra os certificados
     */
    public $desconto_expresso;

    /**
     *@var string diretorio onde se encontra os certificados
     */
    public $pagador;

    /**
     *@var string diretorio onde se encontra os certificados
     */
    public $dados_individuais_boleto;

    /**
     *@var string diretorio onde se encontra os certificados
     */
    public $juros;

    /**
     *@var string diretorio onde se encontra os certificados
     */
    public $recebimento_divergente;

    /**
     *@var string diretorio onde se encontra os certificados
     */
    public $lista_mensagem_cobranca;

    public function __construct()
    {
        $this->pagador = new Payer();
        $this->dados_individuais_boleto = new IndividualBilletData();
        $this->juros = new Fees();
        $this->recebimento_divergente = new DivergentReceipt();
        $this->lista_mensagem_cobranca = new BillingMessageList();
    }
}
