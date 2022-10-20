<?php

namespace Itau\Service;

use Itau\Models\DataSlip;
use Itau\Models\DataSlipPix;
use Itau\Models\Pix\Pix;
use Exception;

class Factory extends Client
{
    const BOLETO = 1;
    const BOLETO_PIX = 2;
    const PIX = 3;

    public $type;

    public function __construct($settings, $type)
    {
        $this->type = $type;
        parent::__construct($settings, $type);
    }

    /**
     * @throws Exception
     */
    public function build(array $data)
    {
        switch ($this->type) {
            case self::BOLETO:
                $endpoint = 'boletos';
                $object = new DataSlip();
                break;
            case self::BOLETO_PIX:
                $endpoint = 'boletos_pix';
                $object = new DataSlipPix();
                break;
            case self::PIX:
                $endpoint = 'cob';
                $object = new Pix();
                break;
            default:
                throw new Exception('Tipo inválido');
        }

        return $this->register($object->build($data), 'POST', $endpoint);
    }

    public function register($data, $method, $endpoint)
    {
        $token = $this->getApiToken();
        return $this->call($method, $endpoint, $token->access_token, $data);
    }
}