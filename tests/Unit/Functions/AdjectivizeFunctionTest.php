<?php

namespace Functions;

use Morpher\Ws3\Clients\MorpherClient;
use Morpher\Ws3\Functions\AdjectivizeFunction;
use Morpher\Ws3\Functions\GendersFunction;
use Morpher\Ws3\Functions\SpellFunction;
use Morpher\Ws3\Languages\RussianLanguage;
use PHPUnit\Framework\TestCase;

class AdjectivizeFunctionTest extends TestCase
{
    public function test_invoke_russian() {
        $f = new AdjectivizeFunction(new MorpherClient(), new RussianLanguage());
        $result = $f->invoke('Москва');

        $this->assertNotEmpty($result);
        $this->assertEquals('московский', $result[0]);
    }
}
