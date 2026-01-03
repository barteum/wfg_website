<?php

declare (strict_types=1);
namespace XCloner\Sabre\DAV\Xml;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
/**
 * XML service for WebDAV.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Service extends \XCloner\Sabre\Xml\Service
{
    /**
     * This is a list of XML elements that we automatically map to PHP classes.
     *
     * For instance, this list may contain an entry `{DAV:}propfind` that would
     * be mapped to Sabre\DAV\Xml\Request\PropFind
     */
    public $elementMap = [
        '{DAV:}multistatus' => 'XCloner\Sabre\DAV\Xml\Response\MultiStatus',
        '{DAV:}response' => 'XCloner\Sabre\DAV\Xml\Element\Response',
        // Requests
        '{DAV:}propfind' => 'XCloner\Sabre\DAV\Xml\Request\PropFind',
        '{DAV:}propertyupdate' => 'XCloner\Sabre\DAV\Xml\Request\PropPatch',
        '{DAV:}mkcol' => 'XCloner\Sabre\DAV\Xml\Request\MkCol',
        // Properties
        '{DAV:}resourcetype' => 'XCloner\Sabre\DAV\Xml\Property\ResourceType',
    ];
    /**
     * This is a default list of namespaces.
     *
     * If you are defining your own custom namespace, add it here to reduce
     * bandwidth and improve legibility of xml bodies.
     *
     * @var array
     */
    public $namespaceMap = ['DAV:' => 'd', 'http://sabredav.org/ns' => 's'];
}
