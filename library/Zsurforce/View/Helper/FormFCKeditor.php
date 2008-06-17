<?php
require_once "html/scripts/fckeditor/fckeditor.php";

/**
 * Invocación de FCKeditor desde la vista
 * 
 * @category SURFORCE
 * @package SURFORCE-LIBRARY 
 * @license GPL v2
 */
class Zsurforce_View_Helper_FormFCKeditor
{
	/**
	 * Nombre de la instancia
	 */
    private $_instanceName;
    /**
     * Ruta base de la aplicación
     */
    private $_sBasePath;
    /**
     * El objeto FCKeditor que posteriormente será retornado
     */
    private $_oFCKeditor;

    /**
	 * Generador del FCKeditor
	 * 
     * @param  string $instanceName		instancia
     * @param  string $contentValue		valor del contenido     
     * @return fckeditor 
    */	
    public function formFCKeditor( $instanceName = null, $contentValue = null )
    {
        $this->_instanceName = $instanceName ;
        $this->_contentValue = $contentValue;

        $sBasePath = $_SERVER['PHP_SELF'];
        $sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "index.php" ) );

        $this->_sBasePath = $sBasePath . "html/scripts/fckeditor/";

        $this->_oFCKeditor = new FCKeditor( $this->_instanceName );
        $this->_oFCKeditor->BasePath	= $this->_sBasePath ;
        $this->_oFCKeditor->Value       = $this->_contentValue;
        $this->_oFCKeditor->Config['CustomConfigurationsPath'] = '../myconfig.js' ;
        $this->_oFCKeditor->Width  = '100%' ;
        $this->_oFCKeditor->Height = '400' ;

        return $this->_oFCKeditor->Create();
    }
}
?>