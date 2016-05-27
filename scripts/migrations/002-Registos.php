<?php
/**
 * Created by PhpStorm.
 * User: rpsimao
 * Date: 26/05/16
 * Time: 23:27
 */

class Registos extends Akrabat_Db_Schema_AbstractChange
{

    private $tableName = "registos";


    function up()
    {

        $sql = "
            CREATE TABLE IF NOT EXISTS $this->tableName (
              id int(11) NOT NULL AUTO_INCREMENT,
              arquivo_id varchar(500) NOT NULL,
              dia DATE NOT NULL,
              nome VARCHAR (500) NOT NULL,
              ip_entrada VARCHAR (255),
              ip_saida VARCHAR (255),
              params LONGTEXT,
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