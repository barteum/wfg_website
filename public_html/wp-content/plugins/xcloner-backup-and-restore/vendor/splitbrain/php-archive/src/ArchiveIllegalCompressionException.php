<?php

namespace XCloner\splitbrain\PHPArchive;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
/**
 * Bad or unsupported compression settings requested
 */
class ArchiveIllegalCompressionException extends \Exception
{
}
