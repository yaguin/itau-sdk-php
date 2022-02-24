<?php include 'systemSettings.php';

$api = new \Itau\Service\Api($settings);
$token = $api->getToken();

$data = new \stdClass();
$data->data_vencimento = '2024-02-30';
$response = $api->callPatchMethods('00000000000000000000000', 'data_vencimento', $token, $data);
