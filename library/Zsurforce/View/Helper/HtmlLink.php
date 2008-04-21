<?php

class Zsurforce_View_Helper_HtmlLink
{
    /**
     * Generates a 'link' html.
     *
     * @param  string $url
     * @param  string $text
     * @param  string $alt
     * @return string The element XHTML.
     */
    public function htmlLink( $url, $text, $alt = '')
    {
        return '<A href="'.$url.'" ALT = "'.$alt.'">'.$text.'</A>';
    }
}
