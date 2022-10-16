<?php namespace Itau\Models;

class Discount
{

    /**
     * @var string Código do desconto. Caso exista mais de um desconto, todos os “tipo_desconto” deverão ter o mesmo código.<br/>'00' - Quando não houver condição de desconto – sem desconto<br/>'01' - Quando o desconto for um valor fixo se o título for pago até a data informada (data_desconto)<br/>'02' - Quando o desconto for um percentual do valor do título e for pago até a data informada (data_desconto)<br/>'90' - Percentual por antecipação(utilizando parâmetros do cadastro de beneficiário para dias úteis ou corridos)"<br/>'91' -Valor por antecipação (utilizando parâmetros do cadastro de beneficiário para dias úteis ou corridos)"
     */
    public $codigo_tipo_desconto;

    /**
     * @var string Data limite de cobrança de desconto. Caso o campo esteja vazio, será automaticamente assumido que a cobrança de desconto é até a data de vencimento. Formato: AAAA-MM-DD
     */
    public $data_desconto;

    /**
     * @var string Valor do desconto a ser cobrado. Obrigatório para codigo_tipo_desconto 1 ou 91. Formato do campo: 15 dígitos inteiros e 2 casas decimais
     */
    public $valor_desconto;

    /**
     * @var string Percentual do desconto concedido. Obrigatório para codigo_tipo_desconto 2 ou 90. Formato do campo: 7 dígitos inteiros e 5 casas decimais.
     */
    public $percentual_desconto;

    public function build($data)
    {
        $this->codigo_tipo_desconto = $data['code'];
        $this->valor_desconto = $data['value'];
        $this->percentual_desconto = $data['percent'];
        $this->data_desconto = $data['date'];
    }
}
