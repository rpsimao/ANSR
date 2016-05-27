<?php

/**
 * Created by PhpStorm.
 * User: rpsimao
 * Date: 27/05/16
 * Time: 12:34
 */
class RPS_Aux_VideoRES
{


    public static function size($size)
    {


        $measures = explode("x", $size);

        return 'width="'.$measures[0] / 2 .'" height="'.$measures[1] / 2 .'"';



    }


}