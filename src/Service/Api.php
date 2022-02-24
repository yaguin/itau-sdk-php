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
        return $this->call('POST', 'boletos', $token, $data);
    }

    public function callPatchMethods($slipId, $endPoint, $token, $data)
    {
        return $this->call('PATCH', "boletos/{$slipId}/{$endPoint}", $token, $data);
    }
}