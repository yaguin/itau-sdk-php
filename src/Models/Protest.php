<?php namespace Itau\Models;

class Protest
{
    /**
     * @var string Códigos das instruções de protesto. Ver "Tabela de Instruções". ESTE CAMPO ESTÁ EM AJUSTE. CASO DESEJE PROTESTAR O TÍTULO, POR FAVOR, INFORMAR NO CAMPO DE INSTRUÇÃO
     */
    public $protesto;

    /**
     * @var string Quantidade de dias requisitado para instrução de protesto
     */
    public $quantidade_dias_protesto;

    public function build($protestData)
    {
        $this->protesto = $protestData['protest'];
        $this->quantidade_dias_protesto = $protestData['quantity_days'] ?? '';
    }
}
