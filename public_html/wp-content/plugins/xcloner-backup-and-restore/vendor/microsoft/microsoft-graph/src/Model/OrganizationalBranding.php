<?php

/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* OrganizationalBranding File
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
* OrganizationalBranding class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class OrganizationalBranding extends OrganizationalBrandingProperties
{
    /**
     * Gets the localizations
     * Add different branding based on a locale.
     *
     * @return array|null The localizations
     */
    public function getLocalizations()
    {
        if (array_key_exists("localizations", $this->_propDict)) {
            return $this->_propDict["localizations"];
        } else {
            return null;
        }
    }
    /**
     * Sets the localizations
     * Add different branding based on a locale.
     *
     * @param OrganizationalBrandingLocalization[] $val The localizations
     *
     * @return OrganizationalBranding
     */
    public function setLocalizations($val)
    {
        $this->_propDict["localizations"] = $val;
        return $this;
    }
}
