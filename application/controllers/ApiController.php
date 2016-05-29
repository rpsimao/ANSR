<?php

class ApiController extends RPS_Controllers_Auth
{

    public function init()
    {
        parent::init();
    }

    public function indexAction()
    {
        // action body
    }

    public function restAction()
    {

        $tokenID = "Nt8w6nMhF1E9MILX5SrWuQo893rlp7eZ";

        $token = $this->_getParam("token");

        $date = $this->_getParam("date");

        $process = $this->_getParam("processo");


        if ($token !== $tokenID)
        {
            $erro = [

                "status"=> 401,
                "message" => "Token Invalido",
                "code" => 401
            ];

            $this->_helper->json($erro, true, array(
                'enableJsonExprFinder' => true,
                'keepLayouts'          => false,
            ));


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

                $erro = [

                    "status"=> 400,
                    "message" => "Pedido invalido. O metodo nao existe.",
                    "code" => 400
                ];

                $this->_helper->json($erro, true, array(
                    'enableJsonExprFinder' => true,
                    'keepLayouts'          => false,
                ));


            }


        }







    }


}

