<?php

namespace Morpher\Ws3\Languages;

use Morpher\Ws3\Models\DeclensionFunctionExtendedResult;
use Morpher\Ws3\Models\DeclensionFunctionTuple;
use Morpher\Ws3\Models\Declensions;

class KazakhLanguage extends MorpherLanguage {
    public function getName(): string {
        return 'qazaq';
    }

    public function declensionNames(): Declensions {
        $d = new Declensions();
        $d->nominative = 'A';
        $d->genitive = 'І';
        $d->dative = 'Б';
        $d->accusative = 'Т';
        $d->instrumental = 'Ш';
        $d->prepositional = 'Ж';
        $d->prepositionalO = 'К';
        return $d;
    }

    public function declensionFunctionExtendedResultNames(): DeclensionFunctionExtendedResult {
        $d = new DeclensionFunctionExtendedResult();
        $d->firstPerson = 'менің';
        $d->secondPerson = 'сенің';
        $d->secondPersonRespectful = 'сіздің';
        $d->thirdPerson = 'оның';
        $d->firstPersonPlural = 'біздің';
        $d->secondPersonPlural = 'сендердің';
        $d->secondPersonRespectfulPlural = 'сіздердің';
        $d->thirdPersonPlural = 'олардың';
        return $d;
    }

    public function declensionFunctionTupleNames(): DeclensionFunctionTuple {
        $d = new DeclensionFunctionTuple();
        $d->plural = 'көпше';
        return $d;
    }
}
