<?php

namespace Itau\Models;

class Settings extends DefaultModel
{
    /**
     *@var bool true - homologação | false - produção
     */
    public $sandBox;

    /**
     * Certificate.
     *
     * @var Itau\Models\Certificate
     */
    public $certificate;

    public $clientId;

    public $clientSecret;

    public $correlationID;

    public $apiToken;

    public function __construct()
    {
        $this->certificate = new Certificate();
    }
}
