<?php include 'systemSettings.php';

$factory = new \Itau\Service\Factory($settings, 3);
$parameter = $factory->build([
    'pix' => [
        'key' => '60701190000104',
        'payer_request' => 'Informar cartão fidelidade',
        'calendar' => [
            'expiration' => '3600'
        ],
        'debtor' => [
            'name' => 'Empresa de Serviços SA',
            'document' => '12345678000195'
        ],
        'value' => [
            'original' => '123.45',
        ],
        'additional_information' => [
            ['name' => 'Campo 1', 'value' => 'Informação Adicional1'],
            ['name' => 'Campo 2', 'value' => 'Informação Adicional2']
        ]
    ]
]);
