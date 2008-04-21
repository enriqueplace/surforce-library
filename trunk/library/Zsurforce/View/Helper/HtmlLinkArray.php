<?php

class Zsurforce_View_Helper_HtmlLinkArray
{
    /**
     * Generates a 'link' html.
     *
     * @param  string $url
     * @param  string $text
     * @param  string $alt
     * @return string The element XHTML.
     */
    public function htmlLinkArray(array $param )
    {
        return
        	'<A href="' . $param['url'] .
        	'" ALT = "' . $param['alt'] .
        	'">' . $param['text'] . '</A>';
    }
}
