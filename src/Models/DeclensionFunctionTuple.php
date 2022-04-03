<?php

namespace Morpher\Ws3\Models;

use Morpher\Ws3\Languages\MorpherLanguage;

class DeclensionFunctionTuple
{
    /** @var DeclensionFunctionExtendedResult|string */
    public $main;

    /** @var DeclensionFunctionExtendedResult|string */
    public $plural;

    public static function load(array $data, MorpherLanguage $language): self {
        $model = new self();
        $names = $language->declensionFunctionTupleNames();
        $model->main = DeclensionFunctionExtendedResult::load($data, $language);
        $model->plural = DeclensionFunctionExtendedResult::load($data[$names->plural] ?? [], $language);
        return $model;
    }
}
