<?php

namespace XCloner\Aws\SSO\Exception;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
use XCloner\Aws\Exception\AwsException;
/**
 * Represents an error interacting with the **AWS Single Sign-On** service.
 */
class SSOException extends AwsException
{
}
