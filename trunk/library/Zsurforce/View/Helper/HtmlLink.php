<?php
/**
 * Generates a 'link' html.
 * 
 * @category SURFORCE
 * @package SURFORCE-LIBRARY 
 * @license GPL v2
 */
class Zsurforce_View_Helper_HtmlLink
{
    /**
     * Generates a 'link' html.
     *
     * @param  string $url
     * @param  string $text
     * @param  string $alt
     * @param  string $base
     * @return string The element XHTML.
     */
    public function htmlLink( $url, $text, $alt = '', $base = null)
    {
        return '<A href="'.$base.$url.'" title ="'.$alt.'">'.$text.'</A>';
    }
}
?>
