<?php

class ApiController extends RPS_Controllers_Auth
{

    public function init()
    {
        parent::init();
    }

    public function indexAction()
    {
        $dbE = new Application_Model_Enderecos();
        $this->view->token = $dbE->findByID(1);
    }

    public function restAction()
    {


        $dbE = new Application_Model_Enderecos();
        $tokenID = $dbE->findByID(1);

        $token = $this->_getParam("token");

        $date = $this->_getParam("date");

        $process = $this->_getParam("processo");


        if ($token !== $tokenID[0]['token'])
        {
            $error = [

                "status"=> 401,
                "message" => "Token Invalido",
                "code" => 401

            ];

            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout->disableLayout();

            $this->_response->clearBody();
            $this->_response->clearHeaders();
            $this->_response->setHttpResponseCode(401);
            $this->_response->append("msg", Zend_Json_Encoder::encode($error));


        } else {


            $db = new Application_Model_Registos();

            if ($date)
            {
                $result = $db->searchByDate($date);

                $this->_helper->json($result, true, array(
                    'enableJsonExprFinder' => true,
                    'keepLayouts'          => false,
                ));

            } elseif ($process)

            {
                $result = $db->searchByProcess($process);

                $this->_helper->json($result, true, array(
                    'enableJsonExprFinder' => true,
                    'keepLayouts'          => false,
                ));
            }

            else {

               $error = [

                    "status"=> 400,
                    "message" => "Pedido invalido. O metodo nao existe.",
                    "code" => 400
                ];


                $this->_helper->viewRenderer->setNoRender(true);
                $this->_helper->layout->disableLayout();

                $this->_response->clearBody();
                $this->_response->clearHeaders();
                $this->_response->setHttpResponseCode(400);
                $this->_response->append("msg", Zend_Json_Encoder::encode($error));





            }


        }







    }


}

