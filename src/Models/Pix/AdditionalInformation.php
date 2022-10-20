<?php

namespace Itau\Models\Pix;

class AdditionalInformation
{
    /**
     * @var string <= 50 characters
     * Nome do campo, que se queira dar a informação apresentada.
     * Se for enviado, é necessário o envio do campo infoAdicionais.valor, campo com limitação de 50 caracteres
     */
    public $nome;

    /**
     * @var	string<= 200 characters
     * Valor ou dados a serem apresentados ao pagador.
     * Se for enviado, é necessário o envio do campo infoAdicionais.nome, campo com limitação de 200 caracteres
     */
    public $valor;
}