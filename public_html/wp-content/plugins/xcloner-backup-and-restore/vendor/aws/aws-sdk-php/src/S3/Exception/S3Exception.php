<?php

namespace XCloner\Aws\S3\Exception;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
use XCloner\Aws\Exception\AwsException;
/**
 * Represents an error interacting with the Amazon Simple Storage Service.
 */
class S3Exception extends AwsException
{
}
