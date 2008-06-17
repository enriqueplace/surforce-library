<?php
/**
 * Cantidad de registros encontrados en una búsqueda
 * 
 * @category SURFORCE
 * @package SURFORCE-LIBRARY 
 * @license GPL v2
 */
class Zsurforce_View_Helper_FormNumeracion
{
    /**
    * Cantidad de registros encontrados en una búsqueda
    * 
    * @param integer cantTotal 		cantidad de registros que devuelve la consulta
    * @param integer cantMaxima 	la cantidad maxima de registros a mostrar por pagina
    * @param integer pagActual		pagina actual dentro del listado
    * @return xhtml
    */
    function formNumeracion( $cantTotal = 0, $cantMaxima = 10, $pagActual = 0 ){
        $cantInicio = ( $pagActual * $cantMaxima ) + 1;
        $cantAux = ( $pagActual + 1 ) * $cantMaxima;
        if ( $cantAux > $cantTotal){
            $cantFinal = $cantTotal;
        }else{
            $cantFinal = $cantAux;
        }
        $xhtml = "|$cantInicio al $cantFinal de $cantTotal encontradas|";
        return $xhtml;
    }
}
?>