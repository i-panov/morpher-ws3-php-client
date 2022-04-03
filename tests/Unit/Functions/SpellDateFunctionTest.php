<?php

namespace Functions;

use Morpher\Ws3\Clients\MorpherClient;
use Morpher\Ws3\Functions\SpellDateFunction;
use Morpher\Ws3\Languages\RussianLanguage;
use PHPUnit\Framework\TestCase;

class SpellDateFunctionTest extends TestCase
{
    public function test_invoke_russian() {
        $f = new SpellDateFunction(new MorpherClient(), new RussianLanguage());
        $result = $f->invoke(new \DateTime('2022-04-03'));

        $this->assertNotNull($result);
        $this->assertEquals('третье апреля две тысячи двадцать второго года', $result->nominative);
    }
}
