<?php

namespace App\Tests\Controller;

use App\Services\Example\ExampleService;
use PHPUnit\Framework\TestCase;

class ExampleServiceTest extends TestCase
{
    public function testGetData(): void
    {
        $exampleS = new ExampleService();
        $data = $exampleS->getData();

        $this->assertArrayHasKey("test", $data);
        $this->assertEquals($data["test"], "example");
    }
}
