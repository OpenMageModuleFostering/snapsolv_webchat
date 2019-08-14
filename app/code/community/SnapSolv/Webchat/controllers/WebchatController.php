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

class SnapSolv_Webchat_WebchatController extends Mage_Core_Controller_Front_Action
{
	/**
	 *  Index Action
	 *	@param 
	 *  @return
	 */
	public function indexAction()
	{        

		 $response = array(
         'status' => 'success',
         'error' => 1,
         'message' => 'This site has the module installed'
       );
		 echo json_encode($response);
				exit; 	 
	}
	

	public function sendapiAction(){
		
		$data = array(
			"account_type"=>"prm",
			"name" => $this->getRequest()->getPost('business_name'),
			"brand_name"=> $this->getRequest()->getPost('business_name'),
			"agent_firstname"=> $this->getRequest()->getPost('first_name'),
			"agent_lastname"=> $this->getRequest()->getPost('last_name'),
			"agent_email"=> $this->getRequest()->getPost('email'),
			"username"=> $this->getRequest()->getPost('email'),
			"password"=> $this->getRequest()->getPost('password'),
			"agent_phone"=> $this->getRequest()->getPost('phone_number'),
			"is_thirdparty_signup"=>true,
			"third_party_source"=>"Magneto",
		);
		
		$serialize_data = serialize($data);
		$data = http_build_query($data);
		$url='https://api.snapsolv.com:3060/company/create?type=account';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url );
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$server_output = curl_exec($ch );
		$res = json_decode($server_output, true);
		//$widgetScript = str_replace("https://","http://",$res['widgetScript']);
		$results = array(
				'widget_script' => $res['widgetScript'], 
				'data' => $serialize_data, 
				'date' => date('Y-m-d')
			);
		
		$model = Mage::getModel('webchat/webchat')->load(1)->addData($results);
		try {
			if($res['widgetScript']){
				$model->save(); //save data
				echo $this->__("Thanks. You are successfully registered."); 
				 
			}
			else {
				echo $this->__("Customer already created."); 
					
			}
			//$insertId = $model->getWebchatId();
		} catch (Exception $e) {
			echo $e->getMessage();
		}
		curl_close ($ch);
		//print_r($server_output);
		return $server_output;
		exit;
	}
	
	
	public function sendloginapiAction(){
		
		$data = array(
			"username"=> $this->getRequest()->getPost('username'),
			"password"=> $this->getRequest()->getPost('password')
			
		);
		$serialize_data = serialize($data);
		$data = http_build_query($data);
		$url='https://api.snapsolv.com:3060/account/get_chat_script';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url );
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$server_output = curl_exec($ch );
		$res = json_decode($server_output, true);
		//$widgetScript = str_replace("https://","http://",$res['widgetScript']);
		$results = array(
				'widget_script' => $res['widgetScript'],  
				'data' => $serialize_data, 
				'date' => date('Y-m-d')
			);
		$model = Mage::getModel('webchat/webchat')->load(1)->addData($results);
		try {
			if($res['widgetScript']){
				$model->save();
				echo $this->__("You are logged in."); 
			}
			else {
				echo $this->__("Customer not exist.");	
			}
			//$insertId = $model->getWebchatId();
		} catch (Exception $e) {
			echo $e->getMessage();
		}
		curl_close ($ch);
		//print_r($server_output);
		return $server_output;
		exit;
	}
	
	public function deleteAction()
    {
		$id = $this->getRequest()->getParam('webchat_id');
			try {
              Mage::getModel('webchat/webchat')->setId($id)->delete();
            } 
			catch(Exception $e) {
                Mage::getSingleton('core/session')->addError($this->__('Error occurred: %s',$e->getMessage()));
                $this->_redirectReferer();
                return;
            }
        //Mage::getSingleton('core/session')->addSuccess($this->__('Successfully reset.'));
	
    }
	
}