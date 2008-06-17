<?php
/**
 * Clase para definir un logger para la aplicación
 * 
 * @category SURFORCE
 * @package SURFORCE-LIBRARY 
 * @license GPL v2
 */
class Zsurforce_Utils_Logger 
{
    public static function log( $mensaje )
    {
        $config = Zend_Registry::get('config_sys');
        $writer = new Zend_Log_Writer_Stream('./log/app.log');
        $logger = new Zend_Log($writer);
        
        if ($config->constantes->debug){
            $logger->log($mensaje, Zend_Log::INFO);
        }
    }
}
?>