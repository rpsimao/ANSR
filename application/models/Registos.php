<?php

class Application_Model_Registos extends RPS_Abstract_CRUD
{


    public function __construct()
    {
        $table = new Application_Model_DbTable_Registos();

        parent::__construct($table);
    }


    /**
     * Get All Values from DB By Date
     * @return array
     * @throws Zend_Db_Table_Exception
     */
    public function getAllByDate()
    {
        try {
            $sql = $this->table->select();
            $sql->order("dia ASC");
            $rows = $this->table->fetchAll($sql)->toArray();

            return $rows;

        } catch (Zend_Db_Table_Exception $e) {
            return $e->getMessage() ;
        }
    }

    /**
     * @param $date dia da procura
     * @return array
     */
    public function searchByDate($date)
    {
        $sql = $this->table->select();
        $sql->where("dia = ?", $date);

        $rows = $this->table->fetchAll($sql);

        return $rows->toArray();
    }

    /**
     * @param $process procura por nome do processo
     * @return array
     */

    public function searchByProcess($process)
    {
        $sql = $this->table->select();
        $sql->where("nome = ?", $process);

        $rows = $this->table->fetchAll($sql);

        return $rows->toArray();
    }

}

