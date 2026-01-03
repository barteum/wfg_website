<?php

/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* WindowsWebApp File
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
/**
* WindowsWebApp class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class WindowsWebApp extends MobileApp
{
    /**
     * Gets the appUrl
     * The web app URL.
     *
     * @return string|null The appUrl
     */
    public function getAppUrl()
    {
        if (array_key_exists("appUrl", $this->_propDict)) {
            return $this->_propDict["appUrl"];
        } else {
            return null;
        }
    }
    /**
     * Sets the appUrl
     * The web app URL.
     *
     * @param string $val The appUrl
     *
     * @return WindowsWebApp
     */
    public function setAppUrl($val)
    {
        $this->_propDict["appUrl"] = $val;
        return $this;
    }
}
