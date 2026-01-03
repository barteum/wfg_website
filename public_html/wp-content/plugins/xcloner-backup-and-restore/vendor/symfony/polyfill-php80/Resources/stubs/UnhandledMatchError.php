<?php

namespace XCloner;

if (!\defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
if (\PHP_VERSION_ID < 80000) {
    class UnhandledMatchError extends \Error
    {
    }
    \class_alias('XCloner\UnhandledMatchError', 'UnhandledMatchError', \false);
}
