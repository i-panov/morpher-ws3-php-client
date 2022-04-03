<?php

namespace Morpher\Ws3\Models;

class SpellFunctionResult
{
    /** @var Declensions */
    public $numberDeclensions;

    /** @var Declensions */
    public $unitDeclensions;

    public function __construct(array $data) {
        $this->numberDeclensions = new Declensions($data['n'] ?? []);
        $this->unitDeclensions = new Declensions($data['unit'] ?? []);
    }
}
