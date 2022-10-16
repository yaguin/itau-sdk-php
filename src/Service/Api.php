<?php

namespace Itau\Service;

class Api extends Client
{
    public function getToken()
    {
        $response = $this->getApiToken();
        return $response->access_token;
    }

    public function registerSlipBank($token, $data)
    {
        $class = new \stdClass();
        $class->data = $data;
        return $this->call('POST', 'boletos', $token, $class);
    }

    public function registerSlipPix($token, $data)
    {
        $this->url = 'https://secure.api.itau/pix_recebimentos_conciliacoes/v2/';
        return $this->call('POST', 'boletos_pix', $token, $data);
    }

    public function callPatchMethods($slipId, $endPoint, $token, $data)
    {
        return $this->call('PATCH', "boletos/{$slipId}/{$endPoint}", $token, $data);
    }
}