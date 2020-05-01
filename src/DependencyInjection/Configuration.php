<?php
/**
 * 01.05.2020.
 */

declare(strict_types=1);

namespace CreativeQuillJs\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Configuration for QuillJS bundle.
 */
class Configuration implements ConfigurationInterface
{
    /**
     * @inheritDoc
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $builder = new TreeBuilder('creative_quill_js');
        $builder->getRootNode()
            ->children()
            ->booleanNode('enabled')->defaultTrue()->end()
            ->scalarNode('theme')->defaultValue('snow')->end()
            ->scalarNode('quill_js_source')->defaultValue('https://cdn.quilljs.com/1.3.6/quill.js')->end()
            ->scalarNode('quill_css_source')->defaultValue('https://cdn.quilljs.com/1.3.6/quill.snow.css')->end()
            ->scalarNode('upload_route')->defaultNull()->end()
            ->arrayNode('upload_route_parameters')
                    ->arrayPrototype()->end()->scalarPrototype()->end()
            ->end()
            ->arrayNode('toolbar_options')
                ->arrayPrototype()->variablePrototype()
            ->end()
        ;

        return $builder;
    }
}
