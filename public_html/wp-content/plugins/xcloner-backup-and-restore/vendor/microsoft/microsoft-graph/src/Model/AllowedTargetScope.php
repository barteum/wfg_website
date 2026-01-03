<?php

/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* AllowedTargetScope File
* PHP version 7
*
* @category  Library
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
namespace XCloner\Microsoft\Graph\Model;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
use XCloner\Microsoft\Graph\Core\Enum;
/**
* AllowedTargetScope class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class AllowedTargetScope extends Enum
{
    /**
     * The Enum AllowedTargetScope
     */
    const NOT_SPECIFIED = "notSpecified";
    const SPECIFIC_DIRECTORY_USERS = "specificDirectoryUsers";
    const SPECIFIC_CONNECTED_ORGANIZATION_USERS = "specificConnectedOrganizationUsers";
    const SPECIFIC_DIRECTORY_SERVICE_PRINCIPALS = "specificDirectoryServicePrincipals";
    const ALL_MEMBER_USERS = "allMemberUsers";
    const ALL_DIRECTORY_USERS = "allDirectoryUsers";
    const ALL_DIRECTORY_SERVICE_PRINCIPALS = "allDirectoryServicePrincipals";
    const ALL_CONFIGURED_CONNECTED_ORGANIZATION_USERS = "allConfiguredConnectedOrganizationUsers";
    const ALL_EXTERNAL_USERS = "allExternalUsers";
    const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}
