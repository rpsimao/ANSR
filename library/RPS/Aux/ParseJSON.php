<?php

/**
 * Created by PhpStorm.
 * User: rpsimao
 * Date: 26/05/16
 * Time: 23:57
 */
class RPS_Aux_ParseJSON
{

    public static function parse($string)
    {

        $values = Zend_Json_Decoder::decode($string);

        return $values;


    }


}