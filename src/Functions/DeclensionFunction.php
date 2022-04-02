<?php

namespace Morpher\Ws3\Functions;

use GuzzleHttp\Exception\GuzzleException;
use Morpher\Ws3\Exceptions\MorpherException;
use Morpher\Ws3\Languages\KazakhLanguage;
use Morpher\Ws3\Languages\RussianLanguage;
use Morpher\Ws3\Languages\UkrainianLanguage;
use Morpher\Ws3\Models\DeclensionFunctionResult;

/**
 * Склонение по падежам
 *
 * @link https://morpher.ru/ws3/#declension Документация к API
 */
class DeclensionFunction extends MorpherFunctionBase
{
    public static function getAvailableLanguages(): array {
        return [new RussianLanguage(), new UkrainianLanguage(), new KazakhLanguage()];
    }

    /**
     * @throws GuzzleException
     * @throws MorpherException
     */
    public function invoke(string $query, array $flags = []): DeclensionFunctionResult {
        $params = [
            's' => require_non_empty_string($query, 'query'),
        ];

        if ($flags) {
            $params['flags'] = implode(',', $flags);
        }

        return new DeclensionFunctionResult($this->request($params), $this->getLanguage());
    }
}
