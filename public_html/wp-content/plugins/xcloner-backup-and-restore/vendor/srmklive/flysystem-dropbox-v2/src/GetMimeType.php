<?php

namespace XCloner\Srmklive\Dropbox;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
trait GetMimeType
{
    /**
     * {@inheritdoc}
     */
    public function getMimetype($path)
    {
        return ['mimetype' => \XCloner\League\Flysystem\Util\MimeType::detectByFilename($path)];
    }
}
