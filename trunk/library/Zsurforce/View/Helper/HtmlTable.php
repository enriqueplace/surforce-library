<?php
/**
 * Genera tabla html
 * 
 * @category SURFORCE
 * @package SURFORCE-LIBRARY 
 * @license GPL v2
 */
class Zsurforce_View_Helper_HtmlTable
{
	 /**
     * Genera tabla html
     *
     * @param  array $param				opciones de la tabla     
     * @param  boolean $htmlentities	modifica o no las entidades html
     * 
     * @return string The element XHTML.
     */
    public function htmlTable(Array $param, $htmlentities = true )
    {
    	$xhtml = '<table border="1">';
        foreach( $param as $fila){
        	$xhtml .= '<tr>';
        	foreach( $fila as $celda){
        		if($htmlentities){
        			$xhtml .= '<td>'.htmlentities($celda).'</td>';
        		}else{
        			$xhtml .= '<td>'.$celda.'</td>';
        		}        		
        	}
        	$xhtml .= '</tr>';
        }
        $xhtml .= '</table>';
        return $xhtml;
    }
}