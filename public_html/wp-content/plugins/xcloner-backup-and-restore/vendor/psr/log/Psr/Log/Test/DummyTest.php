<?php

namespace XCloner\Psr\Log\Test;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
/**
 * This class is internal and does not follow the BC promise.
 *
 * Do NOT use this class in any way.
 *
 * @internal
 */
class DummyTest
{
    public function __toString()
    {
        return 'DummyTest';
    }
}
