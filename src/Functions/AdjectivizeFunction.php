<?php

namespace Morpher\Ws3\Functions;

use GuzzleHttp\Exception\GuzzleException;
use Morpher\Ws3\Exceptions\MorpherException;
use Morpher\Ws3\Languages\RussianLanguage;
use Morpher\Ws3\Languages\UkrainianLanguage;
use Morpher\Ws3\Models\Genders;
use Morpher\Ws3\Models\SpellFunctionResult;

/**
 * Функция образования прилагательных
 *
 * @link https://morpher.ru/ws3/#adjectivize Документация к API
 */
class AdjectivizeFunction extends MorpherFunctionBase
{
    public static function getAvailableLanguages(): array {
        return [new RussianLanguage()];
    }

    /**
     * @throws GuzzleException
     * @throws MorpherException
     */
    public function invoke(string $query): array {
        $params = [
            's' => require_non_empty_string($query, 'query'),
        ];

        return $this->request($params);
    }
}
