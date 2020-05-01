<?php
/**
 * 01.05.2020.
 */

declare(strict_types=1);

namespace CreativeQuillJs\DependencyInjection;

use CreativeQuillJs\Service\QuillConfigInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Extension for engine.
 */
class CreativeQuillJsExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('config.yaml');

        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $configService = $container->getDefinition(QuillConfigInterface::class)
            ->setArgument(0, $config)
        ;

        $container->getDefinition('creative_quill_js.form_type')
            ->setArgument(0, $configService)
        ;
    }
}
