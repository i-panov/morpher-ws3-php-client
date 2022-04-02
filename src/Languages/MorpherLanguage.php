<?php

namespace Morpher\Ws3\Languages;

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
}
