<?php

namespace Morpher\Ws3\Wrappers;

use GuzzleHttp\Exception\GuzzleException;
use Morpher\Ws3\Exceptions\MorpherException;
use Morpher\Ws3\Functions\GendersFunction;
use Morpher\Ws3\Languages\MorpherLanguage;
use Morpher\Ws3\Languages\RussianLanguage;
use Morpher\Ws3\Models\Genders;

class MorpherGenders extends MorpherWrapper
{
    /**
     * @throws GuzzleException
     * @throws MorpherException
     */
    public function russian(string $query): Genders {
        return $this->invoke(new RussianLanguage(), $query);
    }

    /**
     * @throws GuzzleException
     * @throws MorpherException
     */
    private function invoke(MorpherLanguage $language, string $query): Genders {
        $f = new GendersFunction($this->client, $language);
        return $f->invoke($query);
    }
}
