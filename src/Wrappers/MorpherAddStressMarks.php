<?php

namespace Morpher\Ws3\Wrappers;

use GuzzleHttp\Exception\GuzzleException;
use Morpher\Ws3\Exceptions\MorpherException;
use Morpher\Ws3\Functions\AddStressMarksFunction;
use Morpher\Ws3\Languages\RussianLanguage;

class MorpherAddStressMarks extends MorpherWrapper
{
    /**
     * @throws GuzzleException
     * @throws MorpherException
     */
    public function russian(string $query): string {
        $f = new AddStressMarksFunction($this->client, new RussianLanguage());
        return $f->invoke($query);
    }
}
