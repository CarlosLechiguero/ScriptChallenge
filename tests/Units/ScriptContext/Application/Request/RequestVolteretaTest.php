<?php

declare(strict_types=1);

namespace Challenge\Tests\Units\ScriptContext\Application\Request;

use Challenge\ScriptContext\Application\Request\RequestVoltereta;
use PHPUnit\Framework\TestCase;

class RequestVolteretaTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        

    }
    /** @dataProvider casesTest */
    public function testToArrayReturnsArray(RequestVoltereta $requestVoltereta)
    {
        $result = $requestVoltereta->toArray();

        $this->assertIsArray($result);
        $this->assertArrayHasKey('peoples', $result);
        $this->assertArrayHasKey('restaurant', $result);
        $this->assertArrayHasKey('turn', $result);
    }

    public function casesTest(): array
    {
        return [
            [
                new RequestVoltereta('4', '2', '7')
            ],
        ];
    }

}