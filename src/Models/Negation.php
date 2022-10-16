<?php namespace Itau\Models;

class Negation
{
    /**
     * @var string Códigos das instruções de negativação. Ver "Tabela de Instruções
     */
    public $negativacao;

    /**
     * @var string Quantidade de dias requisitado para instrução de negativação.
     */
    public $quantidade_dias_negativacao;

    /**
     * @var string Caso a quantidade de dias após o vencimento tenha que ser contabilizada em dia útil, informar true. Caso tenha que ser contabilizada em dias corridos, informar false.
     */
    public $dia_util;
    
    public function build($data)
    {
        $this->negativacao = $data['code'];
        $this->quantidade_dias_negativacao = $data['quantity_days'];
        $this->dia_util = $data['day'];
    }
}
