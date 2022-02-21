<?php namespace Itau\Models;

class Certificate
{
    /**
     *@var string diretorio onde se encontra os certificados
     */
    public $folder;

    /**
     *@var string nome do arquivo certificado .PFX
     */
    public $certFile;

    /**
     *@var string nome da chave privada .PEM
     */
    public $privateKey;

    /**
     *@var bool parâmetro de validação do vencimento
     */
    public $noValidate;
}
