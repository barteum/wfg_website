<?php

declare (strict_types=1);
namespace XCloner\Sabre\Event;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
/**
 * This is the old name for the Emitter class.
 *
 * Instead of using EventEmitter, please use Emitter. They are identical
 * otherwise.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class EventEmitter implements EmitterInterface
{
    use EmitterTrait;
}
