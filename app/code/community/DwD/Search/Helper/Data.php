<?php

/*
*
* @category		DwD
* @package		DwD_Search
* @author		DwDesigner - Damian A. Pastorini - damian.pastorini@dwdesigner.com
* @copyright	Copyright(c) 2012 DwDesigner (http://www.dwdesigner.com/)
* @date:        24/01/2014
*
*/

class DwD_Search_Helper_Data extends Mage_Core_Helper_Abstract
{

    public function getConfig($path)
    {
        return Mage::getStoreConfig('dwd_search/'.$path);
    }

    public function attributeExists($data, $returnData=false)
    {
        $result = false;
        $attribute = Mage::getModel('catalog/resource_eav_attribute')->loadByCode($data['type'],$data['code']);
        if(is_object($attribute) && $attribute->getId())
        {
            $result = true;
            if($returnData)
            {
                $result = $attribute;
            }
        }
        return $result;
    }

}
