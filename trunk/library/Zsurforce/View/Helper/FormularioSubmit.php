<?php
/**
 * Retorna un botón submit de un formulario html
 * 
 * @category SURFORCE
 * @package SURFORCE-LIBRARY 
 * @license GPL v2
 */
class Zsurforce_View_Helper_FormularioSubmit
{
    /**
	 * Retorna un botón submit de un formulario html
	 * 
     * @param  array $params		parámetros del campo (texto, valor, etc)
     * @return xhtml 
    */	 
	public function formularioSubmit( $params )
	{
		$xhtml  = '<div id="boton_formulario">';
		$xhtml .= ' <input type="hidden" name="id" value="'.$params['value'].'"/>'; 
		$xhtml .= ' <input type="submit" name="add" value="'.$params['submit'].'" />';
		$xhtml .= '</div>'; 

		return $xhtml;
	}
}
