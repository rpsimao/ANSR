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
        $form = new Application_Form_Login();

        $this->view->form = $form;

        if($this->getRequest()->isPost()){

            if($form->isValid($this->getRequest()->getPost())){

                $values = $form->getValues();

                $login = new RPS_UserService_Clients();
                $login->setURL("/dashboard");
                $login->setTable("users");
                $login->setCredentialColumn("password");
                $login->setIdentityColumn("username");
                $login->setIdentity($values["nome"]);
                $login->setCredential($values["passwd"]);
                $login->setDefaultSessionTime(1800);
                $login->authenticate();

            } else {
                $this->_helper->_layout->setLayout('login');
                $this->view->form   = $form;
                $this->view->errors = $form->getMessages();
            }
        } else {


            $this->redirect("/");
        }
    }


}



