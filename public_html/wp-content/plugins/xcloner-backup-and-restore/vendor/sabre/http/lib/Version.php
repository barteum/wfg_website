<?php

declare (strict_types=1);
namespace XCloner\Sabre\HTTP;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
/**
 * This class contains the version number for the HTTP package.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Version
{
    /**
     * Full version number.
     */
    const VERSION = '5.1.6';
}
