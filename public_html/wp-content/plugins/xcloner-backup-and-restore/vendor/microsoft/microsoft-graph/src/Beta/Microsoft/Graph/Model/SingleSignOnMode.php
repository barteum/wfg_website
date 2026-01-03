<?php

/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* SingleSignOnMode File
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
* SingleSignOnMode class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class SingleSignOnMode extends Enum
{
    /**
     * The Enum SingleSignOnMode
     */
    const NONE = "none";
    const ON_PREMISES_KERBEROS = "onPremisesKerberos";
    const SAML = "saml";
    const PING_HEADER_BASED = "pingHeaderBased";
    const AAD_HEADER_BASED = "aadHeaderBased";
    const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
