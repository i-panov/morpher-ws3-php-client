<?php

namespace Functions;

use Morpher\Ws3\Clients\MorpherClient;
use Morpher\Ws3\Functions\AddStressMarksFunction;
use Morpher\Ws3\Languages\RussianLanguage;
use PHPUnit\Framework\TestCase;

class AddressMarksFunctionTest extends TestCase
{
    public function test_invoke_russian() {
        $f = new AddStressMarksFunction(new MorpherClient(), new RussianLanguage());
        $result = $f->invoke('Белки питаются белками');
        $this->assertEquals('Бе́лки пита́ются бе́лками|белка́ми', $result);
    }
}
