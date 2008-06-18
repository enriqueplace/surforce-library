<?php
/**
 * Retorna un enlace a partir de una url base más parámetros de orden
 * /url/orden/par1/asc/par2
 * 
 * @category SURFORCE
 * @package SURFORCE-LIBRARY 
 * @license GPL v2
 */
class Zsurforce_View_Helper_HtmlLinkOrder
{
    /**
 	 * Retorna un enlace a partir de una url base más parámetros de orden
 	 * /url/orden/par1/asc/par2
	 * 
     * @param string  $url		url base
     * @param string  $orden 	campo que representa el orden de la consulta
     * @param boolean $asc		true = ascendente, false = descendente
     * @param string  $text		texto del enlace
     * @return xhtml 
    */
	public function htmlLinkOrder( $url, $orden, $asc, $text )
	{
		$xhtml = "<a href=".$url.'/orden/'.$orden.'/asc/'.!$asc.">".$text."</a>";
		return $xhtml;
	}
}