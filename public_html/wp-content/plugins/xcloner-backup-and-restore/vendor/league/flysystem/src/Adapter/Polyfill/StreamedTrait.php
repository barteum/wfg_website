<?php

namespace XCloner\League\Flysystem\Adapter\Polyfill;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
trait StreamedTrait
{
    use StreamedReadingTrait;
    use StreamedWritingTrait;
}
