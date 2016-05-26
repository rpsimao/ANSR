<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    protected function _initHeader ()
    {

        $this->bootstrap('layout');
        $layout = $this->getResource('layout');
        $view = $layout->getView();
        $view->addHelperPath("RPS/Views/Helper", "RPS_Views_Helper");
    }

}

