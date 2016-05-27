<?php
/**
 * Created by PhpStorm.
 * User: rpsimao
 * Date: 26/05/16
 * Time: 23:27
 */

class Enderecos extends Akrabat_Db_Schema_AbstractChange
{

    private $tableName = "enderecos";


    function up()
    {

        $sql = "
            CREATE TABLE IF NOT EXISTS $this->tableName (
              id int(11) NOT NULL AUTO_INCREMENT,
              polycom varchar(500) NOT NULL,
              san VARCHAR (500) NOT NULL,
              siga VARCHAR (500) NOT NULL,
              PRIMARY KEY (id)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
        $this->_db->query($sql);


    }


    function down()
    {
        $sql= "DROP TABLE IF EXISTS $this->tableName";
        $this->_db->query($sql);
    }
}