<?php

class Application_Model_Enderecos extends RPS_Abstract_CRUD
{

    public function __construct()
    {
        $table = new Application_Model_DbTable_Enderecos();

        parent::__construct($table);
    }

}

