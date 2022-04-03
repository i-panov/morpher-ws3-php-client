<?php

namespace Functions;

use Morpher\Ws3\Clients\MorpherClient;
use Morpher\Ws3\Functions\DeclensionFunction;
use Morpher\Ws3\Functions\KazakhDeclensionFunction;
use Morpher\Ws3\Languages\KazakhLanguage;
use Morpher\Ws3\Languages\RussianLanguage;
use PHPUnit\Framework\TestCase;

class DeclensionFunctionTest extends TestCase
{
    public function test_invoke_russian() {
        $f = new DeclensionFunction(new MorpherClient(), new RussianLanguage());
        $result = $f->invoke('Тест');

        $this->assertNotNull($result);
        $this->assertNotNull($result->main);
        $this->assertEquals('Теста', $result->main->genitive);
        $this->assertEquals('Тесты', $result->plural->nominative);
    }

    public function test_invoke_kazakh() {
        $f = new KazakhDeclensionFunction(new MorpherClient(), new KazakhLanguage());
        $result = $f->invoke('Нұрсултан Әбішұлы Назарбаев');

        $this->assertNotNull($result);
        $this->assertNotNull($result->main);
        $this->assertNotNull($result->plural);
        $this->assertEquals('Нұрсултан Әбішұлы Назарбаев', $result->main->main->nominative);
        $this->assertEquals('Нұрсултан Әбішұлы Назарбаевтар', $result->plural->main->nominative);
    }
}
