<?php

declare (strict_types=1);
namespace XCloner\Sabre\Uri;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
/**
 * Invalid Uri.
 *
 * This is thrown when an attempt was made to use Sabre\Uri parse a uri that
 * it could not.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (https://evertpot.com/)
 * @license http://sabre.io/license/
 */
class InvalidUriException extends \Exception
{
}
