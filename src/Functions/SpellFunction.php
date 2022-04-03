<?php

namespace Morpher\Ws3\Functions;

use GuzzleHttp\Exception\GuzzleException;
use Morpher\Ws3\Exceptions\MorpherException;
use Morpher\Ws3\Languages\RussianLanguage;
use Morpher\Ws3\Languages\UkrainianLanguage;
use Morpher\Ws3\Models\SpellFunctionResult;

/**
 * Пропись чисел и согласование с числом
 *
 * @link https://morpher.ru/ws3/#propis Документация к API
 */
class SpellFunction extends MorpherFunctionBase
{
    public static function getAvailableLanguages(): array {
        return [new RussianLanguage(), new UkrainianLanguage()];
    }

    /**
     * @throws GuzzleException
     * @throws MorpherException
     */
    public function invoke(float $number, string $unit): SpellFunctionResult {
        $params = [
            'n' => $number,
            'unit' => require_non_empty_string($unit, 'unit'),
        ];

        return new SpellFunctionResult($this->request($params), $this->getLanguage());
    }
}
