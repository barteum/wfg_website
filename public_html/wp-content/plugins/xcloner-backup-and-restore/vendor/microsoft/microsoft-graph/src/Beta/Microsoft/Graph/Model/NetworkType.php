<?php

/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* NetworkType File
* PHP version 7
*
* @category  Library
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
namespace XCloner\Beta\Microsoft\Graph\Model;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
use XCloner\Microsoft\Graph\Core\Enum;
/**
* NetworkType class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class NetworkType extends Enum
{
    /**
     * The Enum NetworkType
     */
    const INTRANET = "intranet";
    const EXTRANET = "extranet";
    const NAMED_NETWORK = "namedNetwork";
    const TRUSTED = "trusted";
    const TRUSTED_NAMED_LOCATION = "trustedNamedLocation";
    const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
