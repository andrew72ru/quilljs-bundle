<?php
/**
 * 01.05.2020.
 */

declare(strict_types=1);

namespace CreativeQuillJs;

use CreativeQuillJs\DependencyInjection\CreativeQuillJsExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class QuillJsBundle extends Bundle
{
    public function getContainerExtension()
    {
        return new CreativeQuillJsExtension();
    }
}
