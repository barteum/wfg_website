<?php

/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* SafeguardSettings File
* PHP version 7
*
* @category  Library
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
namespace XCloner\Beta\Microsoft\Graph\WindowsUpdates\Model;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
/**
* SafeguardSettings class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class SafeguardSettings extends \XCloner\Beta\Microsoft\Graph\Model\Entity
{
    /**
     * Gets the disabledSafeguardProfiles
     * List of safeguards to ignore per device.
     *
     * @return SafeguardProfile|null The disabledSafeguardProfiles
     */
    public function getDisabledSafeguardProfiles()
    {
        if (array_key_exists("disabledSafeguardProfiles", $this->_propDict)) {
            if (is_a($this->_propDict["disabledSafeguardProfiles"], "XCloner\\Beta\\Microsoft\\Graph\\WindowsUpdates\\Model\\SafeguardProfile") || is_null($this->_propDict["disabledSafeguardProfiles"])) {
                return $this->_propDict["disabledSafeguardProfiles"];
            } else {
                $this->_propDict["disabledSafeguardProfiles"] = new SafeguardProfile($this->_propDict["disabledSafeguardProfiles"]);
                return $this->_propDict["disabledSafeguardProfiles"];
            }
        }
        return null;
    }
    /**
     * Sets the disabledSafeguardProfiles
     * List of safeguards to ignore per device.
     *
     * @param SafeguardProfile $val The value to assign to the disabledSafeguardProfiles
     *
     * @return SafeguardSettings The SafeguardSettings
     */
    public function setDisabledSafeguardProfiles($val)
    {
        $this->_propDict["disabledSafeguardProfiles"] = $val;
        return $this;
    }
}
