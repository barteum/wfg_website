<?php

namespace XCloner\Sabre\VObject;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
/**
 * Exception thrown by parser when the end of the stream has been reached,
 * before this was expected.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class EofException extends ParseException
{
}
