<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    protected function _initEnv()
    {

       /* $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


        if (strpos($actual_link , 'localhost') === false ) {

            define('APPLICATION_ENV', 'development');
        }*/



    }



    protected function _initValidateTranslation()
    {

        $translator = new Zend_Translate(
            array(
                'adapter' => 'array',
                'content' => APPLICATION_PATH . '/../vendor/zendframework/zendframework1/resources/languages',
                'locale'  => new Zend_Locale('pt_BR'),
                'scan'    => Zend_Translate::LOCALE_DIRECTORY
            )
        );
        Zend_Validate_Abstract::setDefaultTranslator($translator);



    }

    protected function _initHeader ()
    {

        $this->bootstrap('layout');
        $layout = $this->getResource('layout');
        $view = $layout->getView();
        $view->addHelperPath("RPS/Views/Helper", "RPS_Views_Helper");
    }

}

