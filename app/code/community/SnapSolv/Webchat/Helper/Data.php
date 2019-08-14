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
 * @author	   SnapSolv Developer <suresh@snapsolv.com>
 * @license http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class SnapSolv_Webchat_Helper_Data extends Mage_Core_Helper_Abstract
{
	public function getWebchatCheckEnable()
	{  
	$check = Mage::getStoreConfig('webchat/webchat_settings/webchat_enable');
	if($check) {
		$value = 0;
		$pagesList = $this->getWebchatPages();
		if($pagesList){
			$pagesList = explode(',', $pagesList);
			$currentCmsPage = Mage::getSingleton('cms/page')->getIdentifier();
			$request = Mage::app()->getFrontController()->getRequest();
			$module = $request->getModuleName();
			$controller = $request->getControllerName();
			$action = $request->getActionName();
			
			if (in_array($currentCmsPage, $pagesList)){
				$value = 1;
			} else if($module == 'catalog' && $controller == 'category' && in_array('product_list', $pagesList)){
				$value = 1;
			} else if($module == 'catalog' && $controller == 'product' && in_array('product_details', $pagesList)) {
				$value = 1;
			} else if($module == 'checkout' && $controller == 'cart' && $action == 'index'  && in_array('cart', $pagesList)){
				$value = 1;
			} else if($module == 'checkout' && $controller == 'onepage' && $action == 'index' && in_array('checkout', $pagesList)){
				$value = 1;
			} else if($module == 'customer' && in_array('my_account', $pagesList)){
				$value = 1;
			}
		} 
	}
		return $value;
	}
	
	public function getWebchatPages()
	{  
		$value = Mage::getStoreConfig('webchat/webchat_settings/webchat_pages'); 
		return $value;
	}
	
	public function getWebchatEnable()
	{  
		$value = Mage::getStoreConfig('webchat/webchat_settings/webchat_enable'); 
		return $value;
	}
	
	
}
