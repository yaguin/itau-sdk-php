<?php

namespace Itau\Service;

use Itau\Models\DataSlip;
use Itau\Models\DataSlipPix;
use Exception;

class Factory
{
    /**
     * @throws Exception
     */
    public function build(array $data, int $type)
    {
        if ($type == 1) {
            $object = new DataSlip();
        } else if ($type == 2) {
            $object = new DataSlipPix();
        } else {
            throw new Exception('Tipo inválido');
        }

        return $object->build($data);
    }
}