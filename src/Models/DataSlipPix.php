<?php namespace Itau\Models;

class DataSlipPix extends Data
{
    /**
     * Dados do qrcode que vinculado ao boleto.
     *
     * @var
     */
    public $dados_qrcode;

    public function __construct()
    {
        parent::__construct();
        $this->dados_qrcode = new QRCodeData();
    }

    public function build(array $data)
    {
        $this->etapa_processo_boleto = $data['process_step'];
        $this->beneficiario->id_beneficiario = $data['recipient'];

        $this->dado_boleto->build($data['billetData']);
        $this->dado_boleto->data_emissao = $data['billetData']['emission_date'];
        
        $this->dados_qrcode->build($data['pix']);
        
        return $this;
    }
}
