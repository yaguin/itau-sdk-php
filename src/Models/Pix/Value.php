<?php

namespace Itau\Models\Pix;

class Value
{
    /**
     * @var string \d{1,10}.\d{2}
     * Valor nominal/original da cobrança.
     * Valor deve ser maior que zeros.
     * A Cobrança será criado com flag “permite alteração de valor” igual a não.
     * Dessa forma, não será permitida edição pelo pagador do valor informado nesse campo.
     * Quando o saque estiver presente na cobrança o campo valor.original deve ser preenchido com valor igual a 0.00.
     * Quando o troco estiver presente na cobrança o campo valor.original deve ser preenchido com valor maior que 0.00 (zero).
     */
    public $original;

    /**
     * @var integer($int32) minimum: 0/maximum: 1
     * Modalidade de Alteração. Trata-se de um campo que determina se o valor final do documento pode ser alterado pelo pagador.
     * Na ausência desse campo, assume-se que não se pode alterar o valor do documento de cobrança, ou seja, assume-se o valor 0.
     * Se o campo estiver presente e com valor 1, então está determinado que o valor final da cobrança pode ter seu valor alterado pelo pagador.
     * Quando o saque ou troco estiver presente na cobrança o campo valor.modalidadeAlteracao deve possuir o valor 0 (zero) explicitamente, ou implicitamente.
     */
    public $modalidadeAlteracao;

    /**
     * @var Withdrawal Estrutura com atributos referentes à retirada, seja de saque ou troco PIX.
     */
    public $retirada;

    public function build($data)
    {
        $this->original = $data['original'];

        if (isset($data['alteration_modality'])) {
            $this->modalidadeAlteracao = $data['alteration_modality'];
        }

        if (isset($data['withdrawal'])) {
            $this->retirada = new Withdrawal();
            $this->retirada->build($data['withdrawal']);
        }
    }
}