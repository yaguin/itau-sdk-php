<?php namespace Itau\Models;

class Fees
{

    /**
     *@var string diretorio onde se encontra os certificados
     */
    public $codigo_tipo_juros;

    /**
     *@var string diretorio onde se encontra os certificados
     */
    public $quantidade_dias_juros;

    /**
     *@var string diretorio onde se encontra os certificados
     */
    public $valor_juros;

    public function build($feesData)
    {
        $this->codigo_tipo_juros = $feesData['code'];
        $this->quantidade_dias_juros = $feesData['quantity_days'];
        $this->valor_juros = $feesData['value'];
    }
}
