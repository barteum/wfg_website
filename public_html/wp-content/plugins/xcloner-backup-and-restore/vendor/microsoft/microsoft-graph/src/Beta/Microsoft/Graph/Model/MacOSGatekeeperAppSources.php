<?php

/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* MacOSGatekeeperAppSources File
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
* MacOSGatekeeperAppSources class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class MacOSGatekeeperAppSources extends Enum
{
    /**
     * The Enum MacOSGatekeeperAppSources
     */
    const NOT_CONFIGURED = "notConfigured";
    const MAC_APP_STORE = "macAppStore";
    const MAC_APP_STORE_AND_IDENTIFIED_DEVELOPERS = "macAppStoreAndIdentifiedDevelopers";
    const ANYWHERE = "anywhere";
}
