<?php

namespace Morpher\Ws3\Wrappers;

use Morpher\Ws3\Clients\MorpherClientBase;

abstract class MorpherWrapper
{
    /** @var MorpherClientBase */
    protected $client;

    public function __construct(MorpherClientBase $client) {
        $this->client = $client;
    }
}
