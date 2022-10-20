<?php namespace Itau\Models;

class DataSlip extends Data
{
    /**
     *@var string Código canal da operação
     */
    public $codigo_canal_operacao;

    public function build(array $data)
    {
        $this->codigo_canal_operacao = 'API';
        $this->etapa_processo_boleto = $data['process_step'];
        $this->beneficiario->id_beneficiario = $data['recipient'];

        $this->dado_boleto->build($data['data']);
        $this->dado_boleto->descricao_instrumento_cobranca = "boleto";
        $this->dado_boleto->forma_envio = "impressao";
        $this->dado_boleto->codigo_tipo_vencimento = $data['data']['expiration_type'];
        $this->dado_boleto->desconto_expresso = $data['data']['express_discount'];
        $this->dado_boleto->texto_seu_numero = $data['data']['text_your_number'];

        $class = new \stdClass();
        $class->data = $this;
        return $class;
    }
}
