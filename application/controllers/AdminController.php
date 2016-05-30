<?php

class AdminController extends Zend_Controller_Action
{

    protected $auth = null;

    protected $identity = null;

    public function init()
    {
        $this->auth = Zend_Auth::getInstance();
        if ($this->auth->hasIdentity()) {
            // Identity exists; get it
            $this->identity = $this->auth->getIdentity();
        } else {

            $this->_helper->flashMessenger->addMessage("Não tem permissão para aceder a este recurso.");
            $this->redirect("/");
        }
    }

    public function preDispatch()
    {
        if ($this->_helper->FlashMessenger->hasMessages()) {
            $this->view->messages = $this->_helper->FlashMessenger->getMessages();
        }
    }

    public function indexAction()
    {
        $db = new Application_Model_Users();
        $this->view->users = $db->getAll();

        $dbE = new Application_Model_Enderecos();
        $this->view->uri = $dbE->findByID(1);


        if($this->getRequest()->isPost()){


            $polycom = $this->getRequest()->getParam("polycom");
            $san = $this->getRequest()->getParam("san");
            $siga = $this->getRequest()->getParam("siga");
            $token = $this->getRequest()->getParam("token");


            if ($polycom) {

                $dbE->updateRecord(["polycom" => $polycom], 1);
            }
            else if ($san)
            {
                $dbE->updateRecord(['san' => $san], 1);

            } else if ($siga) {

                $dbE->updateRecord(['siga' => $siga], 1);

            } else {

                $dbE->updateRecord(['token' => $token], 1);

            }

            $this->view->uri = $dbE->findByID(1);

            $this->_helper->flashMessenger->addMessage("Endereço actualizado com sucesso.");


        }

        

    }

    public function newuserAction()
    {
        
        $this->view->form = new Application_Form_NewUser();
    }

    public function newuserinsertAction()
    {

        $form = new Application_Form_NewUser();

        $this->view->form = $form;

        if($this->getRequest()->isPost()){

            if($form->isValid($this->getRequest()->getPost())){

                $values = $form->getValues();

                $db = new Application_Model_Users();
                $ins = $db->insertORupdate($values);


                switch ($ins)
                {
                    case "update":
                        $this->_helper->flashMessenger->addMessage("Utilizador actualizado com sucesso.");
                        break;

                    default:
                        $this->_helper->flashMessenger->addMessage("Utilizador criado com sucesso.");
                        break;

                }
                $this->redirect("/admin");

            } else {

                $this->view->form   = $form;
                $this->view->errors = $form->getMessages();
            }
        } else {


            $this->redirect("/");
        }
        
        
    }

    public function usereditAction()
    {
        $this->_helper->viewRenderer('newuser');

        $id = $this->_getParam("id");
        $db = new Application_Model_Users();
        $user = $db->findByID($id);

        $form = new Application_Form_NewUser();
        $this->view->form = $form->populate($user[0]);





    }

    public function userdelAction()
    {
        $id = $this->_getParam("id");
        $db = new Application_Model_Users();
        $db->removeRecord($id);

        $this->_helper->flashMessenger->addMessage("Utilizador removido com sucesso.");

        $this->redirect("/admin");
    }


}





