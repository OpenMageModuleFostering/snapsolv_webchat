<?php
/**
 * @category SnapSolv
 * @package SnapSolv_Webchat
 * @copyright (c) 2016 DRVYN, Inc.
 * @license http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class SnapSolv_Webchat_Helper_Data extends Mage_Core_Helper_Abstract
{
	public function getWebchatCheckEnable()
	{  
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
		} else {
			$value = Mage::getStoreConfig('webchat/webchat_settings/webchat_enable');
		}
		return $value;
	}
	
	
	public function getWebchatPages()
	{  
		$value = Mage::getStoreConfig('webchat/webchat_settings/webchat_pages'); 
		return $value;
	}
	
	public function getWebchatBusinessId()
	{  
		$value = Mage::getStoreConfig('webchat/webchat_settings/webchat_data_business_id'); 
		return $value;
	}
	
	public function getWebchatFacebookAppId()
	{  
		$value = Mage::getStoreConfig('webchat/webchat_settings/webchat_data_facebook_app_id'); 
		return $value;
	}
	
	public function getWebChatImagesUrl()
	{  
		$value = Mage::getStoreConfig('webchat/webchat_settings/webchat_data_images_url'); 
		return $value;
	}
	
	
	public function getWebChatWidgetTitle()
	{  
		$value = Mage::getStoreConfig('webchat/webchat_settings/webchat_data_widget_title'); 
		return $value;
	}
	
	
	public function getWebChatPositionLeft()
	{  
		$value = Mage::getStoreConfig('webchat/webchat_settings/webchat_data_chat_position_left'); 
		return $value;
	}
	
	
	public function getWebChatPositionRight()
	{  
		$value = Mage::getStoreConfig('webchat/webchat_settings/webchat_data_chat_position_right'); 
		return $value;
	}
	
	public function getWebChatPositionBottom()
	{  
		$value = Mage::getStoreConfig('webchat/webchat_settings/webchat_data_chat_position_bottom'); 
		return $value;
	}
	
	
	public function getWebChatPositionTop()
	{  
		$value = Mage::getStoreConfig('webchat/webchat_settings/webchat_data_chat_position_top'); 
		return $value;
	}
	
	public function getWebChatWidth()
	{  
		$value = Mage::getStoreConfig('webchat/webchat_settings/webchat_data_width'); 
		return $value;
	}
	
	public function getWebchatHeight()
	{  
		$value = Mage::getStoreConfig('webchat/webchat_settings/webchat_data_height'); 
		return $value;
	}
	
	public function getWebChatHeaderBgColor()
	{  
		$value = Mage::getStoreConfig('webchat/webchat_settings/webchat_data_header_bg_color'); 
		return $value;
	}
	
	public function getWebChatHeaderTextColor()
	{  
		$value = Mage::getStoreConfig('webchat/webchat_settings/webchat_data_header_text_color'); 
		return $value;
	}
	
	/*new fields*/
	
	public function getWebChatWidgetHoverTitle()
	{  
		$value = Mage::getStoreConfig('webchat/webchat_settings/webchat_data_widget_hover_title'); 
		return $value;
	}

	/*new fields*/
	
	public function getWebChatPopupMessage()
	{  
		$value = Mage::getStoreConfig('webchat/webchat_settings/webchat_data_popup_message'); 
		return $value;
	}
	
	public function getWebChatPopupTimerInSec()
	{  
		$value = Mage::getStoreConfig('webchat/webchat_settings/webchat_data_popup_timer_in_sec'); 
		return $value;
	}
	
	
	public function getWebChatPopupRefreshTimerInMin()
	{  
		$value = Mage::getStoreConfig('webchat/webchat_settings/webchat_data_popup_refresh_timer_in_min'); 
		return $value;
	}

	public function getWidgetHoverTitle()
	{  
		$value = Mage::getStoreConfig('webchat/webchat_settings/webchat_data_widget_hover_title'); 
		return $value;
	}
	
	public function getWidgetPositionLeft()
	{  
		$value = Mage::getStoreConfig('webchat/webchat_settings/webchat_data_widget_position_left'); 
		return $value;
	}
	
	public function getWidgetPositionRight()
	{  
		$value = Mage::getStoreConfig('webchat/webchat_settings/webchat_data_widget_position_right'); 
		return $value;
	}
	
	public function getWidgetPositionBottom()
	{  
		$value = Mage::getStoreConfig('webchat/webchat_settings/webchat_data_widget_position_bottom'); 
		return $value;
	}
	
}
