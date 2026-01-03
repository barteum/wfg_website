<?php

/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* WindowsInformationProtectionEnforcementLevel File
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
* WindowsInformationProtectionEnforcementLevel class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class WindowsInformationProtectionEnforcementLevel extends Enum
{
    /**
     * The Enum WindowsInformationProtectionEnforcementLevel
     */
    const NO_PROTECTION = "noProtection";
    const ENCRYPT_AND_AUDIT_ONLY = "encryptAndAuditOnly";
    const ENCRYPT_AUDIT_AND_PROMPT = "encryptAuditAndPrompt";
    const ENCRYPT_AUDIT_AND_BLOCK = "encryptAuditAndBlock";
}
