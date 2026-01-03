<?php

namespace XCloner\Aws\Sts\Exception;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
use XCloner\Aws\Exception\AwsException;
/**
 * AWS Security Token Service exception.
 */
class StsException extends AwsException
{
}
