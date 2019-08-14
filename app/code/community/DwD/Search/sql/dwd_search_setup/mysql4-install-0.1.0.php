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

/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

$entityTypeId = $installer->getEntityTypeId('catalog_product');
$attributeData = array('type'=>$entityTypeId, 'code'=>'featured_product');
$attribute = Mage::helper("dwd_search")->attributeExists($attributeData,true);
if(!$attribute)
{
    $installer->addAttribute($entityTypeId, 'featured_product', array
    (
        'attribute_set'                 => 'Default',
        'group'                         => 'General',
        'user_defined'                  => true,
        'label'                         => 'Featured product',
        'type'                          => 'int',
        'input'                         => 'boolean',
        'source'                        => 'eav/entity_attribute_source_table',
        'global'                        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
        'visible'                       => true,
        'required'                      => false,
        'searchable'                    => true,
        'filterable'                    => true,
        'visible_on_front'              => true,
        'visible_in_advanced_search'    => true,
        'used_in_product_listing'       => true,
        'unique'                        => false,
        'used_for_sort_by'              => true,
    ));
}
else
{
    $attribute->setData(array('searchable'=>true, 'visible_in_advanced_search'=>true, 'used_for_sort_by'=>true));
    $attribute->save();
}

$installer->endSetup();
