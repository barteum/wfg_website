<?php

declare (strict_types=1);
namespace XCloner\Sabre\HTTP;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
/**
 * This exception may be emitted by the HTTP\Client class, in case there was a
 * problem emitting the request.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class ClientException extends \Exception
{
}
