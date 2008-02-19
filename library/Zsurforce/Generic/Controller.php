<?php

abstract class Zsurforce_Generic_Controller extends Zend_Controller_Action
{
    protected $registry;
    protected $session;
    
    function init()
    {
        $this->initView();
        $this->view->baseUrl = $this->_request->getBaseUrl();

        /*
         * En el caso de usar surforce-base con las vistas dentro de cada
         * módulo, hay que modificar para que esta definición de scripts
         * sea genérica y busque dentro de cada módulo particular
         */
        $this->view->addBasePath('./html/','');
        
        $this->view->addHelperPath('./application/views/helpers/', 'Helper');
                
        $this->registry = Zend_Registry::getInstance();
        // Zend_Loader::loadClass('clase');
    }
    
    function preDispatch()
    {
        $session = new Zend_Session_Namespace("Autenticacion");
        Zend_Registry::set("session", $session);

        if($session){
            if(Zend_Registry::get('session')->usuarioLogueado){
                $this->view->usuarioLogueado = Zend_Registry::get('session')->usuarioLogueado;
            }
        }
        else
        $this->view->usuarioLogueado = false;
    }
}
?>