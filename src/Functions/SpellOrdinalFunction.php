<?php

namespace Morpher\Ws3\Functions;

use GuzzleHttp\Exception\GuzzleException;
use Morpher\Ws3\Exceptions\MorpherException;
use Morpher\Ws3\Languages\RussianLanguage;
use Morpher\Ws3\Languages\UkrainianLanguage;
use Morpher\Ws3\Models\SpellFunctionResult;

/**
 * Пропись чисел в виде порядковых числительных
 *
 * @link https://morpher.ru/ws3/#spellOrdinal Документация к API
 */
class SpellOrdinalFunction extends MorpherFunctionBase
{
    public static function getAvailableLanguages(): array {
        return [new RussianLanguage()];
    }

    /**
     * @throws GuzzleException
     * @throws MorpherException
     */
    public function invoke(int $number, string $unit): SpellFunctionResult {
        $params = [
            'n' => $number,
            'unit' => require_non_empty_string($unit, 'unit'),
        ];

        return new SpellFunctionResult($this->request($params), $this->getLanguage());
    }
}
