<?php

namespace Tests\Unit\Wrappers;

use Morpher\Ws3\Clients\MorpherClient;
use PHPUnit\Framework\TestCase;

class MorpherDeclensionTest extends TestCase
{
    public function test_russian() {
        $result = MorpherClient::create()->declension()->russian('Тест');

        $this->assertNotNull($result);
        $this->assertNotNull($result->main);
        $this->assertEquals('Теста', $result->main->genitive);
        $this->assertEquals('Тесты', $result->plural->nominative);
    }
}
