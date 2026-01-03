<?php

namespace XCloner\BackblazeB2;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
use XCloner\BackblazeB2\Exceptions\B2Exception;
use XCloner\BackblazeB2\Exceptions\BadJsonException;
use XCloner\BackblazeB2\Exceptions\BadValueException;
use XCloner\BackblazeB2\Exceptions\BucketAlreadyExistsException;
use XCloner\BackblazeB2\Exceptions\BucketNotEmptyException;
use XCloner\BackblazeB2\Exceptions\FileNotPresentException;
use XCloner\BackblazeB2\Exceptions\NotFoundException;
use XCloner\BackblazeB2\Exceptions\UnauthorizedAccessException;
use XCloner\GuzzleHttp\Psr7\Response;
class ErrorHandler
{
    protected static $mappings = ['bad_json' => BadJsonException::class, 'bad_value' => BadValueException::class, 'duplicate_bucket_name' => BucketAlreadyExistsException::class, 'not_found' => NotFoundException::class, 'file_not_present' => FileNotPresentException::class, 'cannot_delete_non_empty_bucket' => BucketNotEmptyException::class, 'unauthorized' => UnauthorizedAccessException::class];
    /**
     * @param Response $response
     *
     * @throws B2Exception
     */
    public static function handleErrorResponse(Response $response)
    {
        $responseJson = json_decode($response->getBody(), \true);
        if (isset(self::$mappings[$responseJson['code']])) {
            $exceptionClass = self::$mappings[$responseJson['code']];
        } else {
            // We don't have an exception mapped to this response error, throw generic exception
            $exceptionClass = B2Exception::class;
        }
        throw new $exceptionClass('Received error from B2: ' . $responseJson['message']);
    }
}
