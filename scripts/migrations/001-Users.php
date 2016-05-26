<?php
/**
 * Created by PhpStorm.
 * User: rpsimao
 * Date: 26/05/16
 * Time: 16:51
 */

class Users extends Akrabat_Db_Schema_AbstractChange
{

    private $tableName = "users";


    function up()
    {

        $sql = "
            CREATE TABLE IF NOT EXISTS $this->tableName (
              id int(11) NOT NULL AUTO_INCREMENT,
              username varchar(50) NOT NULL,
              password varchar(75) NOT NULL,
              admin tinyint(1) NOT NULL DEFAULT 0,
              PRIMARY KEY (id)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
        $this->_db->query($sql);

        $data = array();
        $data['username'] = 'admin';
        $data['password'] = 'admin';
        $data['admin'] = 1;

        $data1 = array();
        $data1['username'] = 'user';
        $data1['password'] = 'user';
        $data1['admin'] = 0;


        $this->_db->insert('users', $data);
        $this->_db->insert('users', $data1);


    }


    function down()
    {
        $sql= "DROP TABLE IF EXISTS $this->tableName";
        $this->_db->query($sql);
    }
}