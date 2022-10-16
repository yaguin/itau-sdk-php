<?php namespace Itau\Models;

class DivergentReceipt
{

    /**
     * @var string Tipo de autorização de recebimento divergente da cobrança.
     * 1 - Quando o título aceita qualquer valor divergente ao da cobrança
     * 2 - Quando o título contém uma faixa de valores aceitos para recebimentos divergentes
     * 3 - Quando o título não deve aceitar pagamentos de valores divergentes ao da cobrança
     * 4 - Quando o título aceitar pagamentos de valores superiores ao mínimo definido
     */
    public $codigo_tipo_autorizacao;

    /**
     * @var string Tipo de autorização de recebimento divergente da cobrança. Obrigatório para codigo_tipo_autorizacao diferente de 01 e 03.
     * V - Recebimento divergente for informado por valores
     * P - Recebimento divergente for informado por percentuais
     */
    public $codigo_tipo_recebimento;

    /**
     * @var string Valor mínimo permitido para pagamento. Obrigatório para codigo_aceite_pagamento_divergente 2 ou 4. Formato do campo: 15 dígitos inteiros e 2 casas decimais.
     */
    public $valor_minimo;

    /**
     * @var string Percentual mínimo permitido para pagamento. Obrigatório para codigo_tipo_autorizacao 2 ou 4. Formato do campo: 7 dígitos inteiros e 5 casas decimais.
     */
    public $percentual_minimo;

    /**
     * @var string Valor máximo permitido para pagamento. Obrigatório para codigo_tipo_autorizacao 2. Formato do campo: 15 dígitos inteiros e 2 casas decimais.
     */
    public $valor_maximo;

    /**
     * @var string Percentual máximo permitido. Obrigatório para codigo_tipo_autorizacao 2. Formato do campo: 7 dígitos inteiros e 5 casas decimais.
     */
    public $percentual_maximo;
}
