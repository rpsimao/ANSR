<?php

class Application_Model_Users extends RPS_Abstract_CRUD
{

    public function __construct()
    {
        $table = new Application_Model_DbTable_Users();

        parent::__construct($table);
    }

}

