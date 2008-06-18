<?php
/**
 * Formato de fecha
 * 
 * @category SURFORCE
 * @package SURFORCE-LIBRARY 
 * @license GPL v2
 */
class Zsurforce_View_Helper_DateFormat
{
    /**
     * Retorna fecha formateada dd/mm/yyyy
     * 
     * @param  date $date	fecha sin formato     
     * @return xhtml 
     */
    public function dateFormat ($date)
    {
        $fecha = explode(" ", $date);
        // $hora = $fecha[1];
        $f = explode("-", $fecha[0]);
        $xhtml = $f['2'] . "/" . $f['1'] . "/" . $f['0'];
        return $xhtml;
    }
}