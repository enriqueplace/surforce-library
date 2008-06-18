<?php
/**
 * Retorna un título <h2> 
 * 
 * @category SURFORCE
 * @package SURFORCE-LIBRARY 
 * @license GPL v2
 */
class Zsurforce_View_Helper_PaginaTitulo
{
    /**
     * Retorna un título h1, h2, etc
     * @param string $text	texto del título
     * @return xhtml
     */
	public function paginaTitulo( $text )
	{
		return "<h2>" . $text . "</h2>";
	}
}
