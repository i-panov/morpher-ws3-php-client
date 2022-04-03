<?php

namespace Functions;

use Morpher\Ws3\Clients\MorpherClient;
use Morpher\Ws3\Functions\SpellFunction;
use Morpher\Ws3\Functions\SpellOrdinalFunction;
use Morpher\Ws3\Languages\RussianLanguage;
use PHPUnit\Framework\TestCase;

class SpellOrdinalFunctionTest extends TestCase
{
    public function test_invoke_russian() {
        $f = new SpellOrdinalFunction(new MorpherClient(), new RussianLanguage());
        $result = $f->invoke(123, 'рубль');

        $this->assertNotNull($result);
        $this->assertNotNull($result->numberDeclensions);
        $this->assertEquals('сто двадцать третий', $result->numberDeclensions->nominative);
        $this->assertEquals('рубль', $result->unitDeclensions->nominative);
    }
}
