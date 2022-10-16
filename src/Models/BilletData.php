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
    public $codigo_tipo_vencimento;

    /**
     *@var string diretorio onde se encontra os certificados
     */
    public $texto_seu_numero;

    /**
     *@var bool diretorio onde se encontra os certificados
     */
    public $desconto_expresso;







    /**
     * @var string Indica o tipo do boleto
     */
    public $tipo_boleto;

    /**
     * @var string Deve ser informado algum dos códigos de carteiras disponíveis: 109, 110,111, 115, 118, 148, 153, 175, 180, 198
     */
    public $codigo_carteira;

    /**
     * @var string Valor total a ser cobrado. Sendo 15 dígitos inteiros e 2 casas decimais. Exemplo: 99999999999999900
     */
    public $valor_total_titulo;

    /**
     * @var string Espécie do título. Ver "Tabela de Espécies"
     */
    public $codigo_especie;

    /**
     * @var string Data de emissão do boleto. Formato: AAAA-MM-DD
     */
    public $data_emissao;

    /**
     * @var string Valor do abatimento da cobrança. Este valor não pode superar o valor da cobrança. Formato do campo: 15 dígitos inteiros e 2 casas decimais.
     */
    public $valor_abatimento;

    /**
     * @var Protest Configuração de protesto
     */
    public $protesto;

    /**
     * @var BillingInstruction Configuração de protesto
     */
    public $instrucao_cobranca;

    /**
     * @var Negation Configuração de protesto
     */
    public $negativacao;

    /**
     * @var Payer Dados do pagador
     */
    public $pagador;

    /**
     * @var Guarantor Nome/Razão social do sacador avalista
     */
    public $sacador_avalista;

    /**
     * @var IndividualBilletData Dados principais do BoleCode para emissão
     */
    public $dados_individuais_boleto;

    /**
     * @var Fees Dados de juros
     */
    public $juros;

    /**
     * @var Fine Dados de Multa
     */
    public $multa;

    /**
     * @var Discount Dados de desconto
     */
    public $desconto;

    /**
     * @var BillingMessageList
     */
    public $lista_mensagem_cobranca;

    /**
     * @var DivergentReceipt Configuração para indicar se será aceito recebimento divergente do valor calculado
     */
    public $recebimento_divergente;

    public function __construct()
    {
        $this->pagador = new Payer();
    }

    public function build($billet)
    {
        $this->tipo_boleto = $billet['type'];
        $this->codigo_carteira = $billet['wallet'];
        $this->valor_total_titulo = $billet['total_title_value'];
        $this->codigo_especie = $billet['species'];

        $this->pagador->build($billet['payer']);

        $this->dados_individuais_boleto = [0 => new IndividualBilletData()];
        $this->dados_individuais_boleto[0]->texto_seu_numero = $billet['individual_billet_data']['text_your_number'];
        $this->dados_individuais_boleto[0]->numero_nosso_numero = $billet['individual_billet_data']['our_number'];
        $this->dados_individuais_boleto[0]->data_vencimento = $billet['individual_billet_data']['due_date'];
        $this->dados_individuais_boleto[0]->valor_titulo = $billet['individual_billet_data']['title_value'];

        if (isset($billet['rebate_value'])) {
            $this->valor_abatimento = $billet['rebate_value'];
        }

        if (isset($billet['protest'])) {
            $this->protesto = new Protest();
            $this->protesto->build($billet['protest']);
        }

        if (isset($billet['billing_instruction'])) {
            $this->instrucao_cobranca = new BillingInstruction();
            $this->instrucao_cobranca->build($billet['billing_instruction']);
        }

        if (isset($billet['negation'])) {
            $this->negativacao = new Negation();
            $this->negativacao->build($billet['negation']);
        }

        if (isset($billet['guarantor'])) {
            $this->sacador_avalista = new Guarantor();
            $this->sacador_avalista->build($billet['guarantor']);
        }

        if (isset($data['fees'])) {
            $this->juros = new Fees();
            $this->juros->build($data['fees']);
        }

        if (isset($data['fine'])) {
            $this->multa = new Fine();
            $this->multa->build($data['fine']);
        }

        if (isset($data['discount'])) {
            $this->desconto = new Discount();
            $this->desconto->build($data['discount']);
        }

        if (isset($data['billing_message_list'])) {
            $this->lista_mensagem_cobranca = [];
            foreach ($data['billing_message_list'] as $key => $message) {
                $this->lista_mensagem_cobranca[$key] = new BillingMessageList();
                $this->lista_mensagem_cobranca[$key]->mensagem = $message;
            }
        }

        if (isset($data['divergent_receipt'])) {
            $this->recebimento_divergente = new DivergentReceipt();
            $this->recebimento_divergente->codigo_tipo_autorizacao = $data['divergent_receipt']['code'];
        }
    }
}
