<?php
/*
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the GNU General Public License
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/gpl-license
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@refersion.com so we can send you a copy immediately.
 *
 * @category   Webchat
 * @package    SnapSolv_Webchat
 * @copyright  Copyright (c) 2016 DRVYN, Inc.
 * @author	   SnapSolv Developer <contact@snapsolv.com>
 * @license http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class SnapSolv_Webchat_Model_System_Config_Source_Cmspages
{
    public function toOptionArray()
    {   
		$pages = Mage::getModel('cms/page')->getCollection()->toOptionArray();
		$cmsPages = array(); 
		$cmsPages[] = array('value'=>'', 'label'=>'-Select Page-');   
		$cmsPages[] = array('value'=>'-1', 'label'=>'No Page');  
		$cmsPages[] = array('value'=>'product_list', 'label'=>'Product List');    			
		$cmsPages[] = array('value'=>'product_details', 'label'=>'Product Details',);   				
		$cmsPages[] = array('value'=>'cart', 'label'=>'Cart');   			
		$cmsPages[] = array('value'=>'checkout', 'label'=>'Checkout');  				
		$cmsPages[] = array('value'=>'my_account', 'label'=>'My Account');     	
		foreach($pages as $page){
			$cmsPages[] = array('value'=>$page['value'], 'label'=>$page['label']);        
		} 
		return $cmsPages;   
    }
}
