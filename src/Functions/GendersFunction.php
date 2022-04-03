<?php

namespace Morpher\Ws3\Functions;

use GuzzleHttp\Exception\GuzzleException;
use Morpher\Ws3\Exceptions\MorpherException;
use Morpher\Ws3\Languages\RussianLanguage;
use Morpher\Ws3\Languages\UkrainianLanguage;
use Morpher\Ws3\Models\Genders;
use Morpher\Ws3\Models\SpellFunctionResult;

/**
 * Склонение прилагательных по родам
 *
 * @link https://morpher.ru/ws3/#GetAdjectiveGenders Документация к API
 */
class GendersFunction extends MorpherFunctionBase
{
    public static function getAvailableLanguages(): array {
        return [new RussianLanguage()];
    }

    /**
     * @throws GuzzleException
     * @throws MorpherException
     */
    public function invoke(string $query): Genders {
        $params = [
            's' => require_non_empty_string($query, 'query'),
        ];

        return new Genders($this->request($params));
    }
}
