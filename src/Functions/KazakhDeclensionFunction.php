<?php

namespace Morpher\Ws3\Functions;

use GuzzleHttp\Exception\GuzzleException;
use Morpher\Ws3\Exceptions\MorpherException;
use Morpher\Ws3\Languages\KazakhLanguage;
use Morpher\Ws3\Models\DeclensionFunctionExtendedResult;
use Morpher\Ws3\Models\DeclensionFunctionTuple;

/**
 * Склонение по падежам (казахская версия)
 *
 * @link https://morpher.ru/ws3/#declension Документация к API
 */
class KazakhDeclensionFunction extends MorpherFunctionBase
{
    public static function getAvailableLanguages(): array {
        return [new KazakhLanguage()];
    }

    public function getName(): string {
        return 'declension';
    }

    /**
     * @throws GuzzleException
     * @throws MorpherException
     */
    public function invoke(string $query): DeclensionFunctionTuple {
        $params = [
            's' => require_non_empty_string($query, 'query'),
        ];

        return DeclensionFunctionTuple::load($this->request($params), $this->getLanguage());
    }
}
