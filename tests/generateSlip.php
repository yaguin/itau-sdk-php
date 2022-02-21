<?php include 'systemSettings.php';

use Itau\Models\Data;

try {

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
    $parameter->dado_boleto->pagador->pessoa->nome_pessoa = "Yago Fernandes Pinheiro";
    $parameter->dado_boleto->pagador->pessoa->tipo_pessoa->codigo_tipo_pessoa = "F";
    $parameter->dado_boleto->pagador->pessoa->tipo_pessoa->numero_cadastro_pessoa_fisica = "02006770632";

    $parameter->dado_boleto->pagador->endereco->nome_logradouro = "Rua Alzira Maria Ferreira, 307";
    $parameter->dado_boleto->pagador->endereco->nome_bairro = "Santa Mônica";
    $parameter->dado_boleto->pagador->endereco->nome_cidade = "Belo Horizonte";
    $parameter->dado_boleto->pagador->endereco->sigla_UF = "MG";
    $parameter->dado_boleto->pagador->endereco->numero_CEP = "31530150";

    $parameter->dado_boleto->dados_individuais_boleto = [];
    $parameter->dado_boleto->dados_individuais_boleto[0]->numero_nosso_numero = "900931";
    $parameter->dado_boleto->dados_individuais_boleto[0]->data_vencimento = "2022-02-22";
    $parameter->dado_boleto->dados_individuais_boleto[0]->valor_titulo = "00000000000007700";

    $parameter->dado_boleto->texto_seu_numero = "900931";

    $parameter->dado_boleto->juros->codigo_tipo_juros = "93";
    $parameter->dado_boleto->juros->quantidade_dias_juros = "1";
    $parameter->dado_boleto->juros->valor_juros = "00000000000000200";

    $parameter->dado_boleto->recebimento_divergente->codigo_tipo_autorizacao = "03";

    $parameter->dado_boleto->lista_mensagem_cobranca = [];
    $parameter->dado_boleto->lista_mensagem_cobranca[0]->mensagem = "Pagavel em qualquer correspondente bancario";
    $parameter->dado_boleto->desconto_expresso = false;


    $api = new \Itau\Service\Api($settings, 'POST', 'boletos');
    $token = $api->getToken();
    dd($api->registerSlipBank($parameter, $token));
} catch (Exception $e) {
    throw $e;
}