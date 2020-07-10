<?php
/**
 * 01.05.2020.
 */

declare(strict_types=1);

namespace CreativeQuillJs\Form;

use CreativeQuillJs\Service\QuillConfigInterface;
use Symfony\Component\Form\{AbstractType,
    Extension\Core\Type\TextareaType,
    FormInterface,
    FormView};
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Form type for QuillJS WYSIWYG.
 */
class QuillJsFormType extends AbstractType
{
    private QuillConfigInterface $quillConfig;

    /**
     * @param QuillConfigInterface $quillConfig
     */
    public function __construct(QuillConfigInterface $quillConfig)
    {
        $this->quillConfig = $quillConfig;
    }

    /**
     * {@inheritDoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options): void
    {
        $view->vars['quill'] = $options['quill'] ?? null;
        $view->vars['upload_type'] = $options['upload_type'] ?? 'image';
    }

    /**
     * {@inheritDoc}
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'quill' => $this->quillConfig->getConfig(),
            'upload_type' => 'image',
        ]);
    }

    /**
     * {@inheritDoc}
     */
    public function getParent(): string
    {
        return TextareaType::class;
    }

    /**
     * {@inheritDoc}
     */
    public function getBlockPrefix(): string
    {
        return 'quilljs';
    }
}
