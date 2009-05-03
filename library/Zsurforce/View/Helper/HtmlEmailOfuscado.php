<?php
/**
 * Generates a 'link' html.
 * 
 * @category SURFORCE
 * @package SURFORCE-LIBRARY 
 * @license GPL v2
 */
class Zsurforce_View_Helper_HtmlEmailOfuscado
{
    /**
     * Generates a string email
     *
     * @param string $email     
     * @return string The element XHTML.
     */
    public function htmlEmailOfuscado($email)
    {
        $arr = explode('@', $email);

        if(count($arr) > 1){
            return $arr[0] .' en ' .$arr[1];
        }else{
            return "falta configurar email en config.ini";
        }        
    }
}