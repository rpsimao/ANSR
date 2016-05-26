<?php

class RPS_Controllers_Messenger extends Zend_Controller_Action
{
    


    public function preDispatch ()
    {
        if ($this->_helper->FlashMessenger->hasMessages()) {
            $this->view->messages = $this->_helper->FlashMessenger->getMessages();
        }
    }




}