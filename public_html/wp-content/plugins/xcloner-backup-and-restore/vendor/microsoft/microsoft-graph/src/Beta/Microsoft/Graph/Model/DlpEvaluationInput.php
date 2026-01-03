<?php

/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* DlpEvaluationInput File
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
* DlpEvaluationInput class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class DlpEvaluationInput extends Entity
{
    /**
     * Gets the accessScope
     *
     * @return AccessScope|null The accessScope
     */
    public function getAccessScope()
    {
        if (array_key_exists("accessScope", $this->_propDict)) {
            if (is_a($this->_propDict["accessScope"], "XCloner\\Beta\\Microsoft\\Graph\\Model\\AccessScope") || is_null($this->_propDict["accessScope"])) {
                return $this->_propDict["accessScope"];
            } else {
                $this->_propDict["accessScope"] = new AccessScope($this->_propDict["accessScope"]);
                return $this->_propDict["accessScope"];
            }
        }
        return null;
    }
    /**
     * Sets the accessScope
     *
     * @param AccessScope $val The value to assign to the accessScope
     *
     * @return DlpEvaluationInput The DlpEvaluationInput
     */
    public function setAccessScope($val)
    {
        $this->_propDict["accessScope"] = $val;
        return $this;
    }
    /**
     * Gets the currentLabel
     *
     * @return CurrentLabel|null The currentLabel
     */
    public function getCurrentLabel()
    {
        if (array_key_exists("currentLabel", $this->_propDict)) {
            if (is_a($this->_propDict["currentLabel"], "XCloner\\Beta\\Microsoft\\Graph\\Model\\CurrentLabel") || is_null($this->_propDict["currentLabel"])) {
                return $this->_propDict["currentLabel"];
            } else {
                $this->_propDict["currentLabel"] = new CurrentLabel($this->_propDict["currentLabel"]);
                return $this->_propDict["currentLabel"];
            }
        }
        return null;
    }
    /**
     * Sets the currentLabel
     *
     * @param CurrentLabel $val The value to assign to the currentLabel
     *
     * @return DlpEvaluationInput The DlpEvaluationInput
     */
    public function setCurrentLabel($val)
    {
        $this->_propDict["currentLabel"] = $val;
        return $this;
    }
    /**
     * Gets the discoveredSensitiveTypes
     *
     * @return DiscoveredSensitiveType|null The discoveredSensitiveTypes
     */
    public function getDiscoveredSensitiveTypes()
    {
        if (array_key_exists("discoveredSensitiveTypes", $this->_propDict)) {
            if (is_a($this->_propDict["discoveredSensitiveTypes"], "XCloner\\Beta\\Microsoft\\Graph\\Model\\DiscoveredSensitiveType") || is_null($this->_propDict["discoveredSensitiveTypes"])) {
                return $this->_propDict["discoveredSensitiveTypes"];
            } else {
                $this->_propDict["discoveredSensitiveTypes"] = new DiscoveredSensitiveType($this->_propDict["discoveredSensitiveTypes"]);
                return $this->_propDict["discoveredSensitiveTypes"];
            }
        }
        return null;
    }
    /**
     * Sets the discoveredSensitiveTypes
     *
     * @param DiscoveredSensitiveType $val The value to assign to the discoveredSensitiveTypes
     *
     * @return DlpEvaluationInput The DlpEvaluationInput
     */
    public function setDiscoveredSensitiveTypes($val)
    {
        $this->_propDict["discoveredSensitiveTypes"] = $val;
        return $this;
    }
}
