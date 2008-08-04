<?php
/**
 * Genera breadcrum
 *
 * @category SURFORCE
 * @package SURFORCE-LIBRARY
 * @license GPL v2
 */
class Zsurforce_View_Helper_HtmlBreadcrum
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
    public function htmlBreadcrum($opciones = array(), $menu = "menu", $base = null)
    {

    	if(count($opciones) > 0){
	    	$link = new Zsurforce_View_Helper_HtmlLinkArray();

	    	$xhtml = '<strong>' . $menu . ':&nbsp;</strong>';

	    	$i = 1;
	        foreach( $opciones as $opcion){

	        	$xhtml .= $link->htmlLinkArray($opcion, $base);

	        	if(count($opciones) != $i){
	        		$xhtml .= '&nbsp;&gt;&nbsp;';
	        	}

	        	$i++;
	        }

	        return $xhtml;

    	}else{

    		return NULL;

    	}
    }
}