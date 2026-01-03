<?php

/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* ComanagementEligibleType File
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
* ComanagementEligibleType class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class ComanagementEligibleType extends Enum
{
    /**
     * The Enum ComanagementEligibleType
     */
    const COMANAGED = "comanaged";
    const ELIGIBLE = "eligible";
    const ELIGIBLE_BUT_NOT_AZURE_AD_JOINED = "eligibleButNotAzureAdJoined";
    const NEEDS_OS_UPDATE = "needsOsUpdate";
    const INELIGIBLE = "ineligible";
    const SCHEDULED_FOR_ENROLLMENT = "scheduledForEnrollment";
}
