<?php

namespace Morpher\Ws3\Languages;

use Morpher\Ws3\Models\DeclensionFunctionExtendedResult;
use Morpher\Ws3\Models\DeclensionFunctionTuple;
use Morpher\Ws3\Models\Declensions;

abstract class MorpherLanguage {
    abstract public function getName(): string;

    /**
     * @param MorpherLanguage[] $languages
     * @return bool
     */
    public function inArray(array $languages): bool {
        $class = get_class($this);
        $name = $this->getName();

        foreach ($languages as $language) {
            if (get_class($language) === $class && $language->getName() === $name) {
                return true;
            }
        }

        return false;
    }

    public function getGender(): string {
        return '';
    }

    public function declensionNames(): Declensions {
        $d = new Declensions();
        $d->nominative = 'И';
        $d->genitive = 'Р';
        $d->dative = 'Д';
        $d->accusative = 'В';
        $d->instrumental = 'Т';
        $d->prepositional = 'П';
        $d->prepositionalO = 'П_о';
        return $d;
    }

    public abstract function declensionFunctionExtendedResultNames(): DeclensionFunctionExtendedResult;

    public abstract function declensionFunctionTupleNames(): DeclensionFunctionTuple;
}
