<?php
/**
 * 01.05.2020.
 */

declare(strict_types=1);

namespace CreativeQuillJs\Service;

/**
 * Class QuillConfig.
 */
class QuillConfig implements QuillConfigInterface
{
    private array $config;

    /**
     * QuillConfig constructor.
     *
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->config = $config;
    }

    /**
     * @return array
     */
    public function getConfig(): array
    {
        return $this->config;
    }
}
