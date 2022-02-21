<?php

namespace Itau\Service;

class Api extends Client
{

    public function getToken()
    {
        $response = $this->getApiToken();
        return $response->access_token;
    }

    public function registerSlipBank($data, $token)
    {
        return $this->call($token, $data);
    }
}