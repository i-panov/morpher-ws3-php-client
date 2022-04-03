<?php

namespace Morpher\Ws3\Wrappers;

use GuzzleHttp\Exception\GuzzleException;
use Morpher\Ws3\Exceptions\MorpherException;
use Morpher\Ws3\Functions\SpellFunction;
use Morpher\Ws3\Functions\SpellOrdinalFunction;
use Morpher\Ws3\Languages\MorpherLanguage;
use Morpher\Ws3\Languages\RussianLanguage;
use Morpher\Ws3\Languages\UkrainianLanguage;
use Morpher\Ws3\Models\SpellFunctionResult;

class MorpherSpellOrdinal extends MorpherWrapper
{
    /**
     * @throws GuzzleException
     * @throws MorpherException
     */
    public function russian(int $number, string $unit): SpellFunctionResult {
        return $this->invoke(new RussianLanguage(), $number, $unit);
    }

    /**
     * @throws GuzzleException
     * @throws MorpherException
     */
    private function invoke(MorpherLanguage $language, int $number, string $unit): SpellFunctionResult {
        $f = new SpellOrdinalFunction($this->client, $language);
        return $f->invoke($number, $unit);
    }
}
