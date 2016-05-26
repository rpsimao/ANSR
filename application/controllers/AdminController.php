<?php

class AdminController extends RPS_Controllers_Auth
{

    public function init()
    {
        parent::init();
    }

    public function indexAction()
    {
        $db = new Application_Model_Users();
        $this->view->users = $db->getAll();

    }
    
    public function newuserAction()
    {
        
        $this->view->form = new Application_Form_NewUser();
    }


}

