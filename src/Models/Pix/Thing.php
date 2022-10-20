<?php

namespace Itau\Models\Pix;

class Thing
{
    /**
     * @var string \d{1,10}.\d{2}
     * Valor mínimo do troco 10.00 e valor máximo do troco 500.00 . Campo que determina o valor do troco efetuado.
     */
    public $valor;

    /**
     * @var integer($int32) minimum: 0/maximum: 1
     * Modalidade de Alteração. Trata-se de um campo que determina se o valor final do documento pode ser alterado pelo pagador.
     * Na ausência desse campo, assume-se que não se pode alterar o valor do troco, ou seja, assume-se o valor 0.
     * Se o campo estiver presente e com valor 1, então está determinado que o valor de troco da cobrança pode ter seu valor alterado pelo pagador.
     */
    public $modalidadeAlteracao;

    /**
     * @var string Modalidade do Agente
     * "AGTEC": "Agente Estabelecimento Comercial". "AGTOT": Agente Outra Espécie de Pessoa Jurídica ou Correspondente no País.
     */
    public $modalidadeAgente;

    /**
     * @var string \d{8}
     * Facilitador de Serviço de Saque
     * ISPB do Facilitador de Serviço de Saque
     */
    public $prestadorDoServicoDeSaque;

    public function build($data)
    {
        $this->valor = $data['value'];
        $this->modalidadeAgente = $data['agent_mode'];
        $this->prestadorDoServicoDeSaque = $data['withdrawal_service_provider'];

        if (isset($data['alteration_modality'])) {
            $this->modalidadeAlteracao = $data['alteration_modality'];
        }
    }
}