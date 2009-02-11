<?php
/**
 * Model Genérico para definir un comportamiento común a
 * todos los models de una aplicación.
 *
 * @category SURFORCE
 * @package SURFORCE-LIBRARY
 * @license GPL v2
 */
abstract class Zsurforce_Generic_Model extends Zend_Db_Table_Abstract
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

    /**
     * Carga de atributos, configuración base
     */
    public function init()
    {
        parent::init();
        /*
         * Carga información desde el bootstrap (index.php).
         */
        $this->_registry = Zend_Registry::getInstance();        
        $this->_debug  = $this->_registry->get('debug');
        $this->_devel   = $this->_registry->get('devel');
        $this->_config  = $this->_registry->get('config');
        $this->_user    = Zend_Auth::getInstance()->getIdentity();

        if( Zend_Registry::isRegistered('session')){
            $this->_session 	= $this->_registry->get('session');
        }
    }
}