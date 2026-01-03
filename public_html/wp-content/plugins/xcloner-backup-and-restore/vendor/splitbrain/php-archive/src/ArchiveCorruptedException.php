<?php

namespace XCloner\splitbrain\PHPArchive;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
/**
 * The archive is unreadable
 */
class ArchiveCorruptedException extends \Exception
{
}
