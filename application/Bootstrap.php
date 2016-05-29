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

    /**
     * Custom Routes
     */
    protected function _initRoutes ()
    {


        $router = Zend_Controller_Front::getInstance()->getRouter();

        $route = new Zend_Controller_Router_Route('admin/userdel/:id', array(
            'controller' => 'admin',
            'action' => 'userdel'));
        $router->addRoute('admin_user_del', $route);


        $route = new Zend_Controller_Router_Route('admin/useredit/:id', array(
            'controller' => 'admin',
            'action' => 'useredit'));
        $router->addRoute('admin_useredit', $route);

        $route = new Zend_Controller_Router_Route('dashboard/view/:id', array(
            'controller' => 'dashboard',
            'action' => 'view'));
        $router->addRoute('dashboard_view', $route);

        $route = new Zend_Controller_Router_Route('api/rest/*', array(
            'controller' => 'api',
            'action' => 'rest'));
        $router->addRoute('api_rest', $route);




    }

}

