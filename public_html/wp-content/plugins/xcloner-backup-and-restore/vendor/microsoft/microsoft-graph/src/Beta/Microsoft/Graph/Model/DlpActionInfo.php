<?php

/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* DlpActionInfo File
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
* DlpActionInfo class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class DlpActionInfo extends Entity
{
    /**
     * Gets the action
     *
     * @return DlpAction|null The action
     */
    public function getAction()
    {
        if (array_key_exists("action", $this->_propDict)) {
            if (is_a($this->_propDict["action"], "XCloner\\Beta\\Microsoft\\Graph\\Model\\DlpAction") || is_null($this->_propDict["action"])) {
                return $this->_propDict["action"];
            } else {
                $this->_propDict["action"] = new DlpAction($this->_propDict["action"]);
                return $this->_propDict["action"];
            }
        }
        return null;
    }
    /**
     * Sets the action
     *
     * @param DlpAction $val The value to assign to the action
     *
     * @return DlpActionInfo The DlpActionInfo
     */
    public function setAction($val)
    {
        $this->_propDict["action"] = $val;
        return $this;
    }
}
