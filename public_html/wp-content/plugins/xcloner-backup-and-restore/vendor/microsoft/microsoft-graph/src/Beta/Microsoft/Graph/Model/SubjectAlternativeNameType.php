<?php

/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* SubjectAlternativeNameType File
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
* SubjectAlternativeNameType class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class SubjectAlternativeNameType extends Enum
{
    /**
     * The Enum SubjectAlternativeNameType
     */
    const NONE = "none";
    const EMAIL_ADDRESS = "emailAddress";
    const USER_PRINCIPAL_NAME = "userPrincipalName";
    const CUSTOM_AZURE_AD_ATTRIBUTE = "customAzureADAttribute";
    const DOMAIN_NAME_SERVICE = "domainNameService";
    const UNIVERSAL_RESOURCE_IDENTIFIER = "universalResourceIdentifier";
}
