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

        $this->view->addHelperPath('./library/Zsurforce/View/Helper/', 'Zsurforce_View_Helper');

        $this->registry = Zend_Registry::getInstance();

        /*
         * Ejemplo para cargar por defecto las clases necesarias para el controller
         */
        // Zend_Loader::loadClass('clase');
    }
	/**
	 * Asegurando antes de "despachar" si hay autenticación o no, si es true,
	 * se registra el usuario que ingresa al sistema, y permite a través de
	 * una variable de la vista poder ocultar o mostrar información (caso de un
	 * admin)
	 */
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