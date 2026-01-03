<?php

/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* AgreementFileData File
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
* AgreementFileData class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class AgreementFileData extends Entity
{
    /**
     * Gets the data
     * Data that represents the terms of use PDF document. Read-only.
     *
     * @return \GuzzleHttp\Psr7\Stream|null The data
     */
    public function getData()
    {
        if (array_key_exists("data", $this->_propDict)) {
            if (is_a($this->_propDict["data"], "XCloner\\GuzzleHttp\\Psr7\\Stream") || is_null($this->_propDict["data"])) {
                return $this->_propDict["data"];
            } else {
                $this->_propDict["data"] = \XCloner\GuzzleHttp\Psr7\Utils::streamFor($this->_propDict["data"]);
                return $this->_propDict["data"];
            }
        }
        return null;
    }
    /**
     * Sets the data
     * Data that represents the terms of use PDF document. Read-only.
     *
     * @param \GuzzleHttp\Psr7\Stream $val The value to assign to the data
     *
     * @return AgreementFileData The AgreementFileData
     */
    public function setData($val)
    {
        $this->_propDict["data"] = $val;
        return $this;
    }
}
