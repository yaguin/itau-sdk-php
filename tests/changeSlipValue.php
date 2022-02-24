<?php include 'systemSettings.php';

$api = new \Itau\Service\Api($settings);
$token = $api->getToken();

$data = new \stdClass();
$data->valor_titulo = '100.00';
$response = $api->callPatchMethods('00000000000000000000000', 'valor_nominal', $token, $data);
