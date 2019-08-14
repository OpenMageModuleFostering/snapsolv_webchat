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
class SnapSolv_Webchat_Block_Adminhtml_Webchat extends Mage_Adminhtml_Block_Widget_Form_Container
{
 public function __construct()
    {     
        $this->_objectId = 'id';
        $this->_blockGroup = 'webchat';
        $this->_controller = 'adminhtml_webchat';
		$this->_headerText = Mage::helper('webchat')->__('Signup to add SnapSolv Chat');		 
    }
}