<?php include 'systemSettings.php';

use Itau\Models\DataSlip;

$factory = new \Itau\Service\Factory();
$parameter = $factory->build([
    'process_step' => 'simulacao',
    'recipient' => $_ENV['BENEFICIARIO'],
    'billetData' => [
        'type' => 'a vista',
        'wallet' => '109',
        'species' => '01',
        'expiration_type' => 3,
        'total_title_value' => '00000000000007700',
        'text_your_number' => '900931',
        'express_discount' => false,
        'payer' => [
            'name' => 'João Pereira da Silva',
            'fantasy_name' => 'João Pereira da Silva',
            'type' => 'F',
            'document' => '00000000000',
            'address' => [
                'street' => 'Rua X, 1548',
                'neighborhood' => 'Bairro Teste',
                'city' => 'São Paulo',
                'uf' => 'SP',
                'cep' => '00000000'
            ]
        ],
        'individual_billet_data' => [
            'text_your_number' => '900931',
            'our_number' => '900931',
            'due_date' => '2025-02-22',
            'title_value' => '00000000000007700'
        ],
        'fees' => [
            'code' => '93',
            'quantity_days' => '1',
            'value' => '00000000000000200'
        ],
        'divergent_receipt' => [
            'code' => '03'
        ],
        'billing_message_list' => [
            'Pagavel em qualquer correspondente bancario'
        ],
        'protest' => [
            'protest' => 4,
            'quantity_days' => ''
        ]
    ]
], 2);

$api = new \Itau\Service\Api($settings);
$token = $api->getToken();
$api->registerSlipPix($token, $parameter);
