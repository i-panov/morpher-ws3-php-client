<?php

namespace Functions;

use Morpher\Ws3\Clients\MorpherClient;
use Morpher\Ws3\Functions\SpellFunction;
use Morpher\Ws3\Languages\RussianLanguage;
use PHPUnit\Framework\TestCase;

class SpellFunctionTest extends TestCase
{
    public function test_invoke_russian() {
        $f = new SpellFunction(new MorpherClient(), new RussianLanguage());
        $result = $f->invoke(123.456, 'рубль');

        $this->assertNotNull($result);
        $this->assertNotNull($result->numberDeclensions);

        $this->assertEquals('сто двадцать три целых четыреста пятьдесят шесть тысячных',
            $result->numberDeclensions->nominative);

        $this->assertEquals('рубля', $result->unitDeclensions->nominative);
    }
}
