<?php

namespace Itau\Models\Pix;

class Calendar
{
    /**
     * @var string Tempo de vida da cobrança, especificado em segundos a partir da data de criação (Calendario.criacao).
     * Caso o campo calendario.expiracao não seja preenchido terá o default de 86400s
     */
    public $expiracao;

    public function build($data)
    {
        $this->expiracao = $data['expiration'];
    }
}