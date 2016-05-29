<?php

class SearchController extends RPS_Controllers_Auth
{



    public function indexAction()
    {

    }


    public function dateAction()
    {

        if($this->getRequest()->isPost()) {

            $date = $this->getRequest()->getParam("date");

            $db = new Application_Model_Registos();
            $this->view->records = $db->searchByDate($date);


            if (count($this->view->records) < 1 )
            {

                $this->_helper->flashMessenger->addMessage("A pesquisa não obteve resultados.");
                $this->redirect("/search");

            }
            

        }


    }


    public function processoAction()
    {

        if($this->getRequest()->isPost()) {

            $this->_helper->viewRenderer('date');

            $nome = $this->getRequest()->getParam("nome");

            $db = new Application_Model_Registos();
            $this->view->records = $db->searchByProcess($nome);

            if (count($this->view->records) < 1)
            {

                $this->_helper->flashMessenger->addMessage("A pesquisa não obteve resultados.");
                $this->redirect("/search");

            }


        }




    }


}

