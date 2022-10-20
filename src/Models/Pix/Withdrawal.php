<?php

namespace Itau\Models\Pix;

class Withdrawal
{
    /**
     * @var Withdraw Estrutura com atributos referentes ao saque PIX.
     * Estrutura enviada na presença da estrutura valor.retirada e na ausência da estrutura valor.retirada.troco.
     */
    public $saque;

    /**
     * @var Thing Estrutura com atributos referentes ao saque PIX.
     * Estrutura enviada na presença da estrutura valor.retirada e na ausência da estrutura valor.retirada.saque.
     */
    public $troco;

    public function build($data)
    {
        if (isset($data['withdraw'])) {
            $this->saque = new Withdraw();
            $this->saque->build($data['withdraw']);
        }

        if (isset($data['thing'])) {
            $this->troco = new Thing();
            $this->troco->build($data['thing']);
        }
    }
}