<?php

namespace Morpher\Ws3\Functions;

use GuzzleHttp\Exception\GuzzleException;
use Morpher\Ws3\Exceptions\MorpherException;
use Morpher\Ws3\Languages\RussianLanguage;

class AddStressMarksFunction extends MorpherFunctionBase
{
    public static function getAvailableLanguages(): array {
        return [new RussianLanguage()];
    }

    public function getHttpMethod(): string {
        return 'POST';
    }

    public function getName(): string {
        return 'addstressmarks';
    }

    /**
     * @throws GuzzleException
     * @throws MorpherException
     */
    public function invoke(string $query): string {
        $params = [
            'text_body' => require_non_empty_string($query, 'query'),
        ];

        return $this->request($params)[0] ?? '';
    }
}
