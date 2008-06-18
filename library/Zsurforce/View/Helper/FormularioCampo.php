<?php
/**
 * Retorna un campo de un formulario html
 * 
 * @category SURFORCE
 * @package SURFORCE-LIBRARY 
 * @license GPL v2
 */
class Zsurforce_View_Helper_FormularioCampo
{
	/**
	 * Retorna un campo de un formulario html
	 * 
     * @param  array $params		parámetros del campo (texto, valor, etc)
     * @return xhtml 
    */	 
	public function formularioCampo( $params )
	{
		$xhtml  = '<p>';
		$xhtml .= ' <label for="'.$params['label'].'">'.$params['text'].':&nbsp;</label>'; 
		$xhtml .= ' <input type="text" name="'.$params['label'].'" size="'.$params['size'].'" value="'.$params['value'].'"/>';
		$xhtml .= '</p>'; 
		return $xhtml;
	}
}
