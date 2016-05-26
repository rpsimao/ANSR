<?php
/**
 * Created by PhpStorm.
 * User: rpsimao
 * Date: 26/05/16
 * Time: 16:59
 */

class RPS_Plugins_Controllers_Msg extends Zend_Controller_Plugin_Abstract
{

    public function dispatchLoopStartup(Zend_Controller_Request_Abstract $request)
    {
        
            $flashmessenger = Zend_Controller_Action_HelperBroker::getStaticHelper('FlashMessenger');
            
        
        if ($flashmessenger->hasMessages()) {
            
            
            
               $this->_helper->FlashMessenger->getMessages();
            }
        
    }
}