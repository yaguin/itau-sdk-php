<?php namespace Itau\Models;

class QRCodeData
{
    /**
     * @var string Chave DICT do recebedor (CNPJ, email, chave aleatória ou telefone)
     */
    public $chave;

    /**
     * @var string Identificador da URL que contém a localização dos dados da cobrança atrelada ao QR Code
     * Esse campo deve ser utilizado quando a imagem do QR Code foi gerado pela API de Location (para reutilização da imagem do QR Code ou para emissão off-line) Caso não seja enviado a location será gerada automaticamente
     */
    public $id_location;

    /**
     * @var string Identificador do tipo de cobranca do PIX.
     * Valores aceitos: cob = cobrança pix imediata
     */
    public $tipo_cobranca;

    public function build($data)
    {
        $this->chave = $data['key'] ?? null;
        $this->id_location = $data['location'] ?? null;
        $this->tipo_cobranca = $data['billing_type'] ?? null;
    }
}
