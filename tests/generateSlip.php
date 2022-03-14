<?php include 'systemSettings.php';

use Itau\Models\Data;

$parameter = new Data();
$parameter->etapa_processo_boleto = 'validacao';
$parameter->codigo_canal_operacao = 'API';

$parameter->beneficiario->id_beneficiario = $_ENV['BENEFICIARIO'];

//Set billet data
$parameter->dado_boleto->descricao_instrumento_cobranca = "boleto";
$parameter->dado_boleto->forma_envio = "impressao";
$parameter->dado_boleto->tipo_boleto = "a vista";
$parameter->dado_boleto->codigo_carteira = "109";
$parameter->dado_boleto->codigo_especie = "01";
$parameter->dado_boleto->codigo_tipo_vencimento = 3;
$parameter->dado_boleto->valor_total_titulo = "00000000000007700";

//Set Paid
$parameter->dado_boleto->pagador->pessoa->nome_pessoa = "João Pereira da Silva";
$parameter->dado_boleto->pagador->pessoa->tipo_pessoa->codigo_tipo_pessoa = 1 == 1 ? 'F' : "J";
if (1 == 1) {
    $parameter->dado_boleto->pagador->pessoa->tipo_pessoa->numero_cadastro_pessoa_fisica = "00000000000";
} else {
    $parameter->dado_boleto->pagador->pessoa->nome_fantasia = 'teste';
    $parameter->dado_boleto->pagador->pessoa->tipo_pessoa->numero_cadastro_nacional_pessoa_juridica = "00000000000";
}

$parameter->dado_boleto->pagador->endereco->nome_logradouro = "Rua X, 1548";
$parameter->dado_boleto->pagador->endereco->nome_bairro = "Bairro Teste";
$parameter->dado_boleto->pagador->endereco->nome_cidade = "São Paulo";
$parameter->dado_boleto->pagador->endereco->sigla_UF = "SP";
$parameter->dado_boleto->pagador->endereco->numero_CEP = "00000000";

$parameter->dado_boleto->dados_individuais_boleto = [];
$parameter->dado_boleto->dados_individuais_boleto[0]->numero_nosso_numero = "900931";
$parameter->dado_boleto->dados_individuais_boleto[0]->data_vencimento = "2025-02-22";
$parameter->dado_boleto->dados_individuais_boleto[0]->valor_titulo = "00000000000007700";

$parameter->dado_boleto->texto_seu_numero = "900931";

$parameter->dado_boleto->juros->codigo_tipo_juros = "93";
$parameter->dado_boleto->juros->quantidade_dias_juros = "1";
$parameter->dado_boleto->juros->valor_juros = "00000000000000200";

$parameter->dado_boleto->recebimento_divergente->codigo_tipo_autorizacao = "03";

$parameter->dado_boleto->lista_mensagem_cobranca = [];
$parameter->dado_boleto->lista_mensagem_cobranca[0]->mensagem = "Pagavel em qualquer correspondente bancario";
$parameter->dado_boleto->desconto_expresso = false;

$parameter->dado_boleto->protesto->protesto = 4; // não protestar

$api = new \Itau\Service\Api($settings);
$token = $api->getToken();
$api->registerSlipBank($token, $parameter);
