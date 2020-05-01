<?php
/**
 * 01.05.2020.
 */

declare(strict_types=1);

namespace CreativeQuillJs\Tests\DependencyInjection;

use CreativeQuillJs\DependencyInjection\CreativeQuillJsExtension;
use CreativeQuillJs\QuillJsBundle;
use CreativeQuillJs\Service\QuillConfigInterface;
use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;

class QuillJsBundleTest extends AbstractExtensionTestCase
{
    /**
     * @return ExtensionInterface[]
     */
    protected function getContainerExtensions(): array
    {
        return [
            new CreativeQuillJsExtension(),
        ];
    }

    public function testContainerHasRequiredServices(): void
    {
        $this->load();
        $this->assertContainerBuilderHasService(QuillConfigInterface::class);
        $this->assertContainerBuilderHasService('creative_quill_js.form_type');
    }

    public function testBundleMethods(): void
    {
        $bundle = new QuillJsBundle();
        $this->assertInstanceOf(CreativeQuillJsExtension::class, $bundle->getContainerExtension());
        $this->assertEquals('CreativeQuillJs', $bundle->getNamespace());
    }
}
