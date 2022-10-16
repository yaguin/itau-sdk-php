<?php namespace Itau\Models;

class IndividualBilletData
{
    /**
     *@var string Número de identificação da cobrança.
     */
    public $numero_nosso_numero;

    /**
     *@var string Data máxima para pagamento sem que haja acréscimo de juros e multa. Formato: AAAA-MM-DD
     */
    public $data_vencimento;

    /**
     *@var string Valor a ser cobrado. Formato do campo: 15 dígitos inteiros e 2 casas decimais
     */
    public $valor_titulo;

    /**
     *@var string Data limite para pagamento. Após esta data, o título não poderá ser pago. Formato: AAAA-MM-DD
     */
    public $data_limite_pagamento;

    /**
     *@var string Campo de 25 caractéres, utilizado na API legado como "identificador_titulo_empresa".
     */
    public $texto_uso_beneficiario;

    /**
     *@var string Seu número é a identificação do boleto que poderá ter letras e números e facilitará a consulta e acompanhamento do status do boleto. Este campo é para controle do cliente. CAMPO OBRIGATÓRIO CASO A COBRANÇA SEJA PROTESTADA
     */
    public $texto_seu_numero;
}
