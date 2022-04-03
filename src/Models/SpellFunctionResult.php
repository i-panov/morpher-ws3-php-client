<?php

namespace Morpher\Ws3\Models;

use Morpher\Ws3\Languages\MorpherLanguage;

class SpellFunctionResult
{
    /** @var Declensions */
    public $numberDeclensions;

    /** @var Declensions */
    public $unitDeclensions;

    public function __construct(array $data, MorpherLanguage $language) {
        $this->numberDeclensions = Declensions::load($data['n'] ?? [], $language);
        $this->unitDeclensions = Declensions::load($data['unit'] ?? [], $language);
    }
}
