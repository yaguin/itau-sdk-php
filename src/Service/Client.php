<?php

namespace Itau\Service;

use Exception;
use GuzzleHttp\Client as GuzzleClient;
use Itau\Models\Settings;
use KryptonPay\Api\ApiContext;
use Itau\Models\Response;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Tightenco\Collect\Support\Collection;

class Client
{
    public $options;
    private $method;
    private $endPoint;
    private $client;
    private $apiContext;
    private $response;
    private $url = 'https://api.itau.com.br/cash_management/v2/';
    /**
     * @var Settings
     */
    private $settings;

    public function __construct(Settings $settings, string $method, string $endPoint)
    {
        $this->settings = $settings;

        if ($this->settings->sandBox) {
            $this->url = 'https://api.itau.com.br/sandbox/cash_management/v2/';
        }

        $this->method = $method;
        $this->endPoint = $endPoint;
        $this->response = new Response();
        $this->client = new GuzzleClient();
    }

    public function call($token, $data = null)
    {
        try {
            $options['headers'] = [
                'x-itau-apikey' => $this->settings->clientId,
                'x-itau-flowID' => $this->settings->clientSecret,
                'x-itau-correlationID' => $this->settings->correlationID,
                'Authorization' => 'Bearer ' . $token
            ];
            $options['cert'] = $this->settings->certificate->folder . $this->settings->certificate->certFile;
            $options['ssl_key'] = $this->settings->certificate->folder . $this->settings->certificate->privateKey;

            $options['json'] = null;
            if ($data) {
                $options['json']['data'] = $this->normalize($data);
            }

            return $this->handleApiReturn(
                $this->client->request($this->method, $this->url . $this->endPoint, $options)
            );
        } catch (\Exception $e) {
            return $this->handleApiError($e);
        }
    }

    public static function arrayRemoveNull($item)
    {
        if (!\is_array($item)) {
            return $item;
        }

        return (new Collection($item))
            ->reject(function ($item) {
                return null === $item;
            })
            ->flatMap(function ($item, $key) {
                return is_numeric($key)
                ? [self::arrayRemoveNull($item)]
                : [$key => self::arrayRemoveNull($item)];
            })
            ->toArray();
    }

    private function normalize(object $data): array
    {
        $serializer = new Serializer([new ObjectNormalizer()]);
        $data = self::arrayRemoveNull($serializer->normalize($data));

        foreach ($data as $key => $d) {
            if (empty($d)) {
                unset($data[$key]);
            }
        }

        return $data;
    }

    private function handleApiReturn($response): object
    {
        $return = null;
        $successCode = [200, 201, 204];
        if (\in_array($response->getStatusCode(), $successCode)) {
            $return = json_decode($response->getBody());
        }

        return $return;
    }

    private function handleApiError(Exception $e): object
    {
        switch ($e->getCode()) {
            case 400:
            case 422:
                $return = json_decode($e->getResponse()->getBody());
                $this->response->code = (int) $e->getCode();
                $this->response->errorCode = (int) $return->codigo;
                $this->response->messages = $return->mensagem;
                $this->response->errors = $return->campos;

                return $this->response;
                break;
            case 401:
                $return = json_decode($e->getResponse()->getBody());
                $this->response->code = (int) $e->getCode();
                $this->response->errorCode = (int) $return->code;
                $this->response->messages = [$return->message];

                return $this->response;
                break;
            case 403:
                $response = $this->getApiToken();
                $this->settings->apiToken = $response->access_token;
                return $this->call();
                /*$this->response->code = (int) $e->getCode();
                $this->response->messages = ['Erro: 403'];
                unset($this->response->errorCode);

                return $this->response;*/
                break;
            case 404:
                $this->response->code = (int) $e->getCode();
                $this->response->messages = ['Erro: 404'];
                unset($this->response->errorCode);

                return $this->response;
                break;
            case 405:
                $this->response->code = (int) $e->getCode();
                $this->response->messages = ['Erro: 405'];
                unset($this->response->errorCode);

                return $this->response;
                break;
            case 503:
                $this->response->code = (int) $e->getCode();
                $this->response->messages = ['Erro: 503'];
                unset($this->response->errorCode);

                return $this->response;
                break;
            default:
                $this->response->code = (int) $e->getCode();
                $this->response->messages = ['Erro: 500'];
                unset($this->response->errorCode);

                return $this->response;
                break;
        }
    }

    protected function getApiToken()
    {
        $options['form_params'] = [
            'grant_type' => 'client_credentials',
            'client_id' => $this->settings->clientId,
            'client_secret' => $this->settings->clientSecret,
        ];

        $options['cert'] = $this->settings->certificate->folder . $this->settings->certificate->certFile;
        $options['ssl_key'] = $this->settings->certificate->folder . $this->settings->certificate->privateKey;

        return $this->handleApiReturn(
            $this->client->request('POST', 'https://sts.itau.com.br/api/oauth/token', $options)
        );
    }
}
