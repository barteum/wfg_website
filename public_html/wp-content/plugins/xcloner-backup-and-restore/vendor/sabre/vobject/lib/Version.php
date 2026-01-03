<?php

namespace XCloner\Sabre\VObject;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
/**
 * This class contains the version number for the VObject package.
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
    const VERSION = '4.5.1';
}
