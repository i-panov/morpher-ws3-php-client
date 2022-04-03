<?php

namespace Morpher\Ws3\Functions;

use GuzzleHttp\Exception\GuzzleException;
use Morpher\Ws3\Exceptions\MorpherException;
use Morpher\Ws3\Languages\RussianLanguage;
use Morpher\Ws3\Models\Declensions;

/**
 * Пропись дат
 *
 * @link https://morpher.ru/ws3/#spellDate Документация к API
 */
class SpellDateFunction extends MorpherFunctionBase
{
    public static function getAvailableLanguages(): array {
        return [new RussianLanguage()];
    }

    /**
     * @throws GuzzleException
     * @throws MorpherException
     */
    public function invoke(\DateTimeInterface $date): Declensions {
        $params = [
            'date' => $date->format('Y-m-d'),
        ];

        return Declensions::load($this->request($params), $this->getLanguage());
    }
}
