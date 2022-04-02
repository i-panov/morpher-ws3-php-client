<?php

namespace Morpher\Ws3\Exceptions;

class MorpherException extends \Exception
{
    public $statusCode;

    public function __construct(string $message, int $statusCode = 0, int $code = 0)
    {
        $this->statusCode = $statusCode;
        parent::__construct($message, $code);
    }
}
