<?php

namespace XCloner\splitbrain\PHPArchive;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
/**
 * File meta data problems
 */
class FileInfoException extends \Exception
{
}
