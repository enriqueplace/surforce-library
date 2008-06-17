<?php
/**
 * Genera menú horizontal
 * 
 * @category SURFORCE
 * @package SURFORCE-LIBRARY 
 * @license GPL v2
 */
class Zsurforce_View_Helper_HtmlMenuHorizontal
{
	 /**
     * Genera menú horizontal
     *
     * @param  array $opciones
     * @param  string $menu 	el texto que debe llevar a modo de descripción inicia     
     * @param  string $base		ruta base
     * 
     * @return string The element XHTML.
     */
    public function htmlMenuHorizontal(array $opciones, $menu = "menu", $base = null)
    {
    	if( count($opciones) > 0 ){
	    	$link = new Zsurforce_View_Helper_HtmlLinkArray();
	    	
	    	$xhtml = '<strong>'.$menu.':&nbsp;</strong>';    	
	        foreach( $opciones as $opcion){
	        	$xhtml .= $link->htmlLinkArray($opcion,$base).'/&nbsp;';
	        }
	        return $xhtml;	
    	}else{
    		return NULL;
    	}    	
    }
}