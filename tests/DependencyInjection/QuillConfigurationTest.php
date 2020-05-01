<?php
/**
 * 01.05.2020.
 */

declare(strict_types=1);

namespace CreativeQuillJs\Tests\DependencyInjection;

use Matthias\SymfonyDependencyInjectionTest\Loader\ExtensionConfigurationBuilder;
use Matthias\SymfonyDependencyInjectionTest\Loader\LoaderFactory;

class QuillConfigurationTest extends QuillConfigurationTestCase
{
    public function provideKeys(): array
    {
        return [
            ['enabled'],
            ['theme'],
            ['quill_js_source'],
            ['quill_css_source'],
            ['upload_route'],
            ['upload_route_parameters'],
            ['toolbar_options'],
        ];
    }

    /**
     * @dataProvider provideKeys
     *
     * @param $key
     */
    public function testConfigurationsAreLoaded(string $key): void
    {
        $sources = [
            __DIR__ . '/../../src/Resources/config/creative_quill_js.yaml',
        ];

        $extensionConfigurationBuilder = new ExtensionConfigurationBuilder(new LoaderFactory());
        $extensionConfiguration = $extensionConfigurationBuilder
            ->setExtension($this->getContainerExtension())
            ->setSources($sources)
            ->getConfiguration();

        $this->assertArrayHasKey($key, $extensionConfiguration[0]);
    }
}
