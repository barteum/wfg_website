<?php

namespace XCloner\Sabre\VObject;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
/**
 * Exception thrown by Reader if an invalid object was attempted to be parsed.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class ParseException extends \Exception
{
}
