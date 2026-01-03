<?php

namespace XCloner;

if (!\defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
if (\class_exists('XCloner\Google_Client', \false)) {
    // Prevent error with preloading in PHP 7.4
    // @see https://github.com/googleapis/google-api-php-client/issues/1976
    return;
}
$classMap = ['XCloner\Google\Client' => 'Google_Client', 'XCloner\Google\Service' => 'Google_Service', 'XCloner\Google\AccessToken\Revoke' => 'Google_AccessToken_Revoke', 'XCloner\Google\AccessToken\Verify' => 'Google_AccessToken_Verify', 'XCloner\Google\Model' => 'Google_Model', 'XCloner\Google\Utils\UriTemplate' => 'Google_Utils_UriTemplate', 'XCloner\Google\AuthHandler\Guzzle6AuthHandler' => 'Google_AuthHandler_Guzzle6AuthHandler', 'XCloner\Google\AuthHandler\Guzzle7AuthHandler' => 'Google_AuthHandler_Guzzle7AuthHandler', 'XCloner\Google\AuthHandler\Guzzle5AuthHandler' => 'Google_AuthHandler_Guzzle5AuthHandler', 'XCloner\Google\AuthHandler\AuthHandlerFactory' => 'Google_AuthHandler_AuthHandlerFactory', 'XCloner\Google\Http\Batch' => 'Google_Http_Batch', 'XCloner\Google\Http\MediaFileUpload' => 'Google_Http_MediaFileUpload', 'XCloner\Google\Http\REST' => 'Google_Http_REST', 'XCloner\Google\Task\Retryable' => 'Google_Task_Retryable', 'XCloner\Google\Task\Exception' => 'Google_Task_Exception', 'XCloner\Google\Task\Runner' => 'Google_Task_Runner', 'XCloner\Google\Collection' => 'Google_Collection', 'XCloner\Google\Service\Exception' => 'Google_Service_Exception', 'XCloner\Google\Service\Resource' => 'Google_Service_Resource', 'XCloner\Google\Exception' => 'Google_Exception'];
foreach ($classMap as $class => $alias) {
    \class_alias($class, $alias);
}
/**
 * This class needs to be defined explicitly as scripts must be recognized by
 * the autoloader.
 */
class Google_Task_Composer extends \XCloner\Google\Task\Composer
{
}
/**
 * This class needs to be defined explicitly as scripts must be recognized by
 * the autoloader.
 */
\class_alias('XCloner\Google_Task_Composer', 'Google_Task_Composer', \false);
/** @phpstan-ignore-next-line */
if (\false) {
    class Google_AccessToken_Revoke extends \XCloner\Google\AccessToken\Revoke
    {
    }
    \class_alias('XCloner\Google_AccessToken_Revoke', 'Google_AccessToken_Revoke', \false);
    class Google_AccessToken_Verify extends \XCloner\Google\AccessToken\Verify
    {
    }
    \class_alias('XCloner\Google_AccessToken_Verify', 'Google_AccessToken_Verify', \false);
    class Google_AuthHandler_AuthHandlerFactory extends \XCloner\Google\AuthHandler\AuthHandlerFactory
    {
    }
    \class_alias('XCloner\Google_AuthHandler_AuthHandlerFactory', 'Google_AuthHandler_AuthHandlerFactory', \false);
    class Google_AuthHandler_Guzzle5AuthHandler extends \XCloner\Google\AuthHandler\Guzzle5AuthHandler
    {
    }
    \class_alias('XCloner\Google_AuthHandler_Guzzle5AuthHandler', 'Google_AuthHandler_Guzzle5AuthHandler', \false);
    class Google_AuthHandler_Guzzle6AuthHandler extends \XCloner\Google\AuthHandler\Guzzle6AuthHandler
    {
    }
    \class_alias('XCloner\Google_AuthHandler_Guzzle6AuthHandler', 'Google_AuthHandler_Guzzle6AuthHandler', \false);
    class Google_AuthHandler_Guzzle7AuthHandler extends \XCloner\Google\AuthHandler\Guzzle7AuthHandler
    {
    }
    \class_alias('XCloner\Google_AuthHandler_Guzzle7AuthHandler', 'Google_AuthHandler_Guzzle7AuthHandler', \false);
    class Google_Client extends \XCloner\Google\Client
    {
    }
    \class_alias('XCloner\Google_Client', 'Google_Client', \false);
    class Google_Collection extends \XCloner\Google\Collection
    {
    }
    \class_alias('XCloner\Google_Collection', 'Google_Collection', \false);
    class Google_Exception extends \XCloner\Google\Exception
    {
    }
    \class_alias('XCloner\Google_Exception', 'Google_Exception', \false);
    class Google_Http_Batch extends \XCloner\Google\Http\Batch
    {
    }
    \class_alias('XCloner\Google_Http_Batch', 'Google_Http_Batch', \false);
    class Google_Http_MediaFileUpload extends \XCloner\Google\Http\MediaFileUpload
    {
    }
    \class_alias('XCloner\Google_Http_MediaFileUpload', 'Google_Http_MediaFileUpload', \false);
    class Google_Http_REST extends \XCloner\Google\Http\REST
    {
    }
    \class_alias('XCloner\Google_Http_REST', 'Google_Http_REST', \false);
    class Google_Model extends \XCloner\Google\Model
    {
    }
    \class_alias('XCloner\Google_Model', 'Google_Model', \false);
    class Google_Service extends \XCloner\Google\Service
    {
    }
    \class_alias('XCloner\Google_Service', 'Google_Service', \false);
    class Google_Service_Exception extends \XCloner\Google\Service\Exception
    {
    }
    \class_alias('XCloner\Google_Service_Exception', 'Google_Service_Exception', \false);
    class Google_Service_Resource extends \XCloner\Google\Service\Resource
    {
    }
    \class_alias('XCloner\Google_Service_Resource', 'Google_Service_Resource', \false);
    class Google_Task_Exception extends \XCloner\Google\Task\Exception
    {
    }
    \class_alias('XCloner\Google_Task_Exception', 'Google_Task_Exception', \false);
    interface Google_Task_Retryable extends \XCloner\Google\Task\Retryable
    {
    }
    \class_alias('XCloner\Google_Task_Retryable', 'Google_Task_Retryable', \false);
    class Google_Task_Runner extends \XCloner\Google\Task\Runner
    {
    }
    \class_alias('XCloner\Google_Task_Runner', 'Google_Task_Runner', \false);
    class Google_Utils_UriTemplate extends \XCloner\Google\Utils\UriTemplate
    {
    }
    \class_alias('XCloner\Google_Utils_UriTemplate', 'Google_Utils_UriTemplate', \false);
}
