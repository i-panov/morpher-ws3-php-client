<?php

namespace Morpher\Ws3\Wrappers;

use GuzzleHttp\Exception\GuzzleException;
use Morpher\Ws3\Clients\MorpherClientBase;
use Morpher\Ws3\Exceptions\MorpherException;
use Morpher\Ws3\Functions\DeclensionFunction;
use Morpher\Ws3\Languages\KazakhLanguage;
use Morpher\Ws3\Languages\MorpherLanguage;
use Morpher\Ws3\Languages\RussianLanguage;
use Morpher\Ws3\Languages\UkrainianLanguage;
use Morpher\Ws3\Models\DeclensionFunctionResult;

class MorpherDeclension extends MorpherWrapper
{
    /**
     * @throws GuzzleException
     * @throws MorpherException
     */
    public function russian(string $query, array $flags = []): DeclensionFunctionResult {
        return $this->invoke(new RussianLanguage(), $query, $flags);
    }

    /**
     * @throws GuzzleException
     * @throws MorpherException
     */
    public function ukrainian(string $query, array $flags = []): DeclensionFunctionResult {
        return $this->invoke(new UkrainianLanguage(), $query, $flags);
    }

    /**
     * @throws GuzzleException
     * @throws MorpherException
     */
    public function kazakh(string $query, array $flags = []): DeclensionFunctionResult {
        return $this->invoke(new KazakhLanguage(), $query, $flags);
    }

    /**
     * @throws GuzzleException
     * @throws MorpherException
     */
    private function invoke(MorpherLanguage $language, string $query, array $flags = []): DeclensionFunctionResult {
        $f = new DeclensionFunction($this->client, $language);
        return $f->invoke($query, $flags);
    }
}
