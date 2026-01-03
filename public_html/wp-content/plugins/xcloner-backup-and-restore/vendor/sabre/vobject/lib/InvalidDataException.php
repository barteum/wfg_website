<?php

namespace XCloner\Sabre\VObject;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
/**
 * This exception is thrown whenever an invalid value is found anywhere in a
 * iCalendar or vCard object.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class InvalidDataException extends \Exception
{
}
