<?php

class DashboardController extends RPS_Controllers_Auth
{

    public function init()
    {
        parent::init();
    }

    public function indexAction()
    {

    }


    public function listagemAction()
    {

      $db = new Application_Model_Registos();

        $results = $db->getAllByDate();


        $this->view->records = $results;




       /* $rr = RPS_Aux_ParseJSON::parse($results[0]["params"]);


        foreach ($rr["videos"] as $video)
        {
            echo $video["id"];


        }*/


        
    }

    public function viewAction()
    {
        $id = $this->_getParam('id');

        $db = new Application_Model_Registos();
        $results = $db->findByID($id);

        $this->view->details = $results;

        $this->view->videos = RPS_Aux_ParseJSON::parse($results[0]["params"]);
        


    }

}

