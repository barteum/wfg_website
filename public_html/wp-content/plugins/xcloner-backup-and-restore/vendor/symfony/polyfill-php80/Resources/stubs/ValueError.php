<?php

namespace XCloner;

if (!\defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
if (\PHP_VERSION_ID < 80000) {
    class ValueError extends \Error
    {
    }
    \class_alias('XCloner\ValueError', 'ValueError', \false);
}
