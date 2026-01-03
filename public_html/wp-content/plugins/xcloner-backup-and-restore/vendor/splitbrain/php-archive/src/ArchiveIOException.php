<?php

namespace XCloner\splitbrain\PHPArchive;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
/**
 * Read/Write Errors
 */
class ArchiveIOException extends \Exception
{
}
