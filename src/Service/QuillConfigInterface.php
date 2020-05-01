<?php
/**
 * 01.05.2020.
 */

declare(strict_types=1);

namespace CreativeQuillJs\Service;

/**
 * QuillConfigInterface.
 */
interface QuillConfigInterface
{
    /**
     * Full QuillJS configuration.
     *
     * @return array
     */
    public function getConfig(): array;
}
