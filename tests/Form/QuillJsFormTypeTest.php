<?php
/**
 * 01.05.2020.
 */

declare(strict_types=1);

namespace CreativeQuillJs\Tests\Form;

use CreativeQuillJs\DependencyInjection\Configuration;
use CreativeQuillJs\Form\QuillJsFormType;
use CreativeQuillJs\Service\QuillConfig;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\Forms;
use Symfony\Component\Yaml\Yaml;

class QuillJsFormTypeTest extends TestCase
{
    private FormFactoryInterface $factory;
    private QuillJsFormType $type;

    protected function setUp(): void
    {
        $configurations = [
            Yaml::parseFile(__DIR__ . '/../../src/Resources/config/creative_quill_js.yaml')['creative_quill_js'],
        ];

        $config = (new Processor())
            ->processConfiguration(new Configuration(), $configurations);
        $this->type = new QuillJsFormType(new QuillConfig($config));

        $this->factory = Forms::createFormFactoryBuilder()
            ->addType($this->type)
            ->getFormFactory();
    }

    public function testDefaultValues(): void
    {
        $form = $this->factory->create(QuillJsFormType::class);
        $view = $form->createView();

        $this->assertArrayHasKey('quill', $view->vars);
        $this->assertArrayHasKey('enabled', $view->vars['quill']);
    }
}
