<?php
class RPS_Views_Helper_JSHelper extends Zend_View_Helper_Abstract
{
    function JSHelper ( $module = false )
    {

        switch ($module){

            case true:
                $request = Zend_Controller_Front::getInstance()->getRequest();
                $file_uri = 'js/'. $request->getModuleName() ."/" . $request->getControllerName() . '/' . $request->getActionName() . '.js';

            break;

            case false:
                $request = Zend_Controller_Front::getInstance()->getRequest();
                $file_uri = 'js/' . $request->getControllerName() . '/' . $request->getActionName() . '.js';

            break;


        }

        
        if (file_exists($file_uri)) {
           return '<script type="text/javascript" src="'.'/' . $file_uri.'"></script>';
        }
    }
}
