<?php

namespace Functions;

use Morpher\Ws3\Clients\MorpherClient;
use Morpher\Ws3\Functions\GendersFunction;
use Morpher\Ws3\Functions\SpellFunction;
use Morpher\Ws3\Languages\RussianLanguage;
use PHPUnit\Framework\TestCase;

class GendersFunctionTest extends TestCase
{
    public function test_invoke_russian() {
        $f = new GendersFunction(new MorpherClient(), new RussianLanguage());
        $result = $f->invoke('уважаемый');

        $this->assertNotNull($result);
        $this->assertEquals('уважаемая', $result->feminine);
    }
}
