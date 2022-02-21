<?php

namespace Itau\Models;

class Response extends DefaultModel
{
    /**
     *@var int code HTTP
     */
    public $code;

    /**
     *@var int errorCode
     */
    public $errorCode;

    /**
     *@var array messages
     */
    public $messages;
}
