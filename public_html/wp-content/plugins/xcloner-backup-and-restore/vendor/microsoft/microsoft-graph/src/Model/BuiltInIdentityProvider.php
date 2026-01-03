<?php

/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* BuiltInIdentityProvider File
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
/**
* BuiltInIdentityProvider class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class BuiltInIdentityProvider extends IdentityProviderBase
{
    /**
     * Gets the identityProviderType
     * The identity provider type. For a B2B scenario, possible values: AADSignup, MicrosoftAccount, EmailOTP. Required.
     *
     * @return string|null The identityProviderType
     */
    public function getIdentityProviderType()
    {
        if (array_key_exists("identityProviderType", $this->_propDict)) {
            return $this->_propDict["identityProviderType"];
        } else {
            return null;
        }
    }
    /**
     * Sets the identityProviderType
     * The identity provider type. For a B2B scenario, possible values: AADSignup, MicrosoftAccount, EmailOTP. Required.
     *
     * @param string $val The identityProviderType
     *
     * @return BuiltInIdentityProvider
     */
    public function setIdentityProviderType($val)
    {
        $this->_propDict["identityProviderType"] = $val;
        return $this;
    }
}
