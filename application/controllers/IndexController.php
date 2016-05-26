<?php

class IndexController extends RPS_Controllers_Messenger
{

    public function init()
    {
        $this->_helper->layout->setLayout('login');
    }

    public function preDispatch ()
    {
        if ($this->_helper->FlashMessenger->hasMessages()) {
            $this->view->messages = $this->_helper->FlashMessenger->getMessages();
        }
    }

    public function indexAction()
    {
        $this->view->form = new Application_Form_Login();
    }

    public function loginAction()
    {
        // action body
    }


}



