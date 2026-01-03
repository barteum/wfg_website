<?php

namespace XCloner\League\Flysystem\Adapter;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
class SynologyFtp extends Ftpd
{
    // This class merely exists because of BC.
}
