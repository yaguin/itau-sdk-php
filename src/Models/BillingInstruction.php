<?php namespace Itau\Models;

class BillingInstruction
{
    /**
     * @var string Códigos das instruções de protesto. Ver "Tabela de Instruções".
     */
    public $codigo_instrucao_cobranca;

    /**
     * @var string Quantidade de dias após vencimento do boleto.
     */
    public $quantidade_dias_apos_vencimento;

    /**
     * @var string Caso a quantidade de dias após o vencimento tenha que ser contabilizada em dia útil, informar true. Caso tenha que ser contabilizada em dias corridos, informar false.
     */
    public $dia_util;
    
    public function build($data)
    {
        $this->codigo_instrucao_cobranca = $data['code'];
        $this->quantidade_dias_apos_vencimento = $data['quantity_days'];
        $this->dia_util = $data['day'];
    }
}
