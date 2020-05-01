<?php
/**
 * 01.05.2020.
 */

declare(strict_types=1);

namespace CreativeQuillJs\Tests\DependencyInjection;

use CreativeQuillJs\DependencyInjection\Configuration;
use CreativeQuillJs\DependencyInjection\CreativeQuillJsExtension;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;

class QuillConfigurationTestCase extends TestCase
{
    /**
     * @inheritDoc
     */
    protected function getContainerExtension(): ExtensionInterface
    {
        return new CreativeQuillJsExtension();
    }

    /**
     * @inheritDoc
     */
    protected function getConfiguration(): ConfigurationInterface
    {
        return new Configuration();
    }
}
