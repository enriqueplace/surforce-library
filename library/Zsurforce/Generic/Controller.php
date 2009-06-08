<?php
/**
 * Controller Genérico para definir un comportamiento común a
 * todos los controllers de una aplicación.
 *
 * @category SURFORCE
 * @package SURFORCE-LIBRARY
 * @license GPL v2
 */
abstract class Zsurforce_Generic_Controller extends Zend_Controller_Action
{
    /**
     * Se obtiene del bootstrap (index.php)
     * para acceder a las variables que serán compartidas desde
     * el arranque (no es igual a una sesión, no persiste).
     */
    protected $_registry = null;
    /**
     * Atributo que contiene la sesión que debe haber iniciado
     * en el bootstrap (index.php).
     */
    protected $_session = null;
    /**
     * Desde el archivo de configuración (config_sys.ini) se define
     * el valor boolean para poder hacer revisiones durante la
     * ejecución de la aplicación.
     */
    protected $_debug = null;

    protected $_controllerName = null;
    
    protected $_moduleName = null;

    protected $_user = null;

    /**
     * Define inicio del controller
     *
     * Carga de atributos, configuración base
     */
    public function init()
    {
        parent::init();
        /*
         * Carga información desde el bootstrap (index.php).
         */
        $this->_registry = Zend_Registry::getInstance();

        if (Zend_Registry::isRegistered('debug')) {
            $this->_debug  = $this->_registry->get('debug');
        }
        if (Zend_Registry::isRegistered('devel')) {
            $this->_devel   = $this->_registry->get('devel');
        }
        if (Zend_Registry::isRegistered('config')) {
            $this->_config  = $this->_registry->get('config');
        }
        
        $this->_user    = Zend_Auth::getInstance()->getIdentity();

        if( Zend_Registry::isRegistered('session')){
            $this->_session 	= $this->_registry->get('session');
        }

        /*
         * Carga información para el layout (antes de las vistas)
         */
        $layout = Zend_Layout::getMvcInstance();
        $layout->logo = $this->_config->layout->logo;


        /*
         * Carga información para las vistas del sistema
         */
        $this->initView();
         if (Zend_Registry::isRegistered('base_path_app')) {
            $this->view->basePath       = $this->_registry->get('base_path_app');
         }
        if (Zend_Registry::isRegistered('base_path_html')) {
            $this->view->basePathHtml 	= $this->_registry->get('base_path_html');
        }
        
        $this->view->baseUrl        = $this->_request->getBaseUrl();

        $this->view->debug    = $this->_debug;
        $this->view->devel     = $this->_devel;
        $this->view->session  = $this->_session;
        $this->view->config   = $this->_config;
        $this->view->user      = $this->_user;

        /*
         * FIXME: generar un archivo de log, al imprimir esta linea
         * rompe la session del sistema
         */
        if(isset($this->_debug) && $this->_debug){
            echo "<!--".var_export($this->_request,true)."-->";
        }      

        $this->_controllerName = $this->view->controllerName = $this->_request->getParam('controller');
        $this->_moduleName = $this->view->moduleName     = $this->_request->getParam('module');

        $this->view->addHelperPath(
            '../library/Zsurforce/View/Helper/',
            'Zsurforce_View_Helper'
        );
        $this->view->addHelperPath(
            'ZendX/JQuery/View/Helper',
            'ZendX_JQuery_View_Helper'
        );

        /*
         * Ejemplo para cargar por defecto las clases necesarias para el controller,
         * como puede ser también un Modelo
         */
        // Zend_Loader::loadClass('clase');
        // Zend_Loader::loadClass('Configuracion');
    }
    /**
     * Asegurando antes de "despachar" si hay autenticación o no, si es true,
     * se registra el usuario que ingresa al sistema, y permite a través de
     * una variable de la vista poder ocultar o mostrar información (caso de un
     * admin).
     *
     * Para este caso no tranca el acceso al módulo, ya que este controller es
     * para los módulos públicos.
     */
    public function preDispatch()
    {
        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity()){
            $this->view->usuarioLogueado = true;
        }
    }
}