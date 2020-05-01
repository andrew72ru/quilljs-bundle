<?php
/**
 * 01.05.2020.
 */

declare(strict_types=1);

namespace CreativeQuillJs\Tests\Service;

use CreativeQuillJs\Service\QuillConfig;
use PHPUnit\Framework\TestCase;

class QuillConfigTest extends TestCase
{
    public function testServiceWithEmptyArray(): void
    {
        $service = new QuillConfig();
        $this->assertEmpty($service->getConfig());
    }

    public function testServiceWithNonEmptyArray(): void
    {
        $expected = ['foo' => 'bar'];
        $service = new QuillConfig($expected);

        $this->assertEquals($service->getConfig(), $expected);
    }
}
