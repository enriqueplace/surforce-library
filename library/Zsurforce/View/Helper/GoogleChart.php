<?php
/**
 * Creación de gráficas con Google Chart
 * 
 * @category SURFORCE
 * @package SURFORCE-LIBRARY 
 * @license GPL v2
 */
class Zsurforce_View_Helper_GoogleChart
{
	/**
	 * Creación de gráficas con Google Chart
	 * 
	 * @param string chx
	 * @param string chtt
	 * @param string chd
	 * @param string chm
	 * @param string chg
	 * @return xhtml
	 */
    public function googleChart( $chx, $chtt, $chd, $chm = null, $chg = null )
    {
    	$chm = "D,C6D9FD,1,0,8|D,4D89F9,0,0,4";
		$chg = "20,50,1,0";

		$pars = array(
			"http://chart.apis.google.com/chart?chs=1000x300",
			"cht=ls",
			"chxt=x,y",
			"chds=1,100",
			"chxl=0:|" . $chx ,
			"chtt=" . $chtt,
			"chd=t:" . $chd,
			"chm=" . $chm,
			"chg=" . $chg
		);

		$url = implode( "&", $pars );

		$xhtml = "<table border='0' align='center'> \n";
		$xhtml .= " <tr>";
		$xhtml .= "  <td>";
		$xhtml .= "   <img src='" . $url . "' alt=''/>";
		$xhtml .= "  </td>";
		$xhtml .= " </tr>";
		$xhtml .= "</table>";

		return $xhtml;
    }
}
?>