<?php

namespace Morpher\Ws3\Wrappers;

use GuzzleHttp\Exception\GuzzleException;
use Morpher\Ws3\Exceptions\MorpherException;
use Morpher\Ws3\Functions\SpellDateFunction;
use Morpher\Ws3\Languages\MorpherLanguage;
use Morpher\Ws3\Languages\RussianLanguage;
use Morpher\Ws3\Models\Declensions;

class MorpherSpellDate extends MorpherWrapper
{
    /**
     * @throws GuzzleException
     * @throws MorpherException
     */
    public function russian(\DateTimeInterface $date): Declensions {
        return $this->invoke(new RussianLanguage(), $date);
    }

    /**
     * @throws GuzzleException
     * @throws MorpherException
     */
    private function invoke(MorpherLanguage $language, \DateTimeInterface $date): Declensions {
        $f = new SpellDateFunction($this->client, $language);
        return $f->invoke($date);
    }
}
