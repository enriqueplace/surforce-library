<?php
/**
 * Generates a 'link' html desde un array.
 * 
 * @category SURFORCE
 * @package SURFORCE-LIBRARY 
 * @license GPL v2
 */
class Zsurforce_View_Helper_HtmlLinkArray
{
    /**
     * Generates a 'link' html desde un array.
     *
     * @param  array $param
     * @param  string $base     
     * 
     * @return string The element XHTML.
     */
    public function htmlLinkArray(array $param, $base = null )
    {    	   	
    	if( count($param) > 0){
    		$ret = '<A href="' . $base . $param['url'].
        		'" title ="' . $param['alt'] .
        		'">' . $param['text'] . '</A>'; 	
    	}else{
    		$ret = NULL;
    	}
        return $ret;
        	
    }
}
?>