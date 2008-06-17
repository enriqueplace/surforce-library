<?php
/**
 * Clase para envío de correo
 * 
 * @category SURFORCE
 * @package SURFORCE-LIBRARY 
 * @license GPL v2
 */
class Zsurforce_Utils_Mailer
{
	/**
	 * Método enviador, intenta enviar directamente o retorna una excepción
	 * 
     * @param  string $to				destinatario del correo
     * @param  string $subject			asunto del correo
     * @param  string $from				quién lo envía
     * @param  string $conCopia			si se copia el envío
     * @param  string $conCopiaOculta	si se copia el envío de forma oculta
     * @throws Exception
    */	
    public static function enviarCorreo( $to, $subject, $message, $from="admin@localhost", $conCopia="", $conCopiaOculta="")
    {
        $to 	.= "\r\n";
        
        $subject .= "\r\n";
        
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";
        $headers .= "To: $to\r\n";
        $headers .= "From: $from\r\n";

        if ($conCopia!=""){
        	$headers .= "Cc: $conCopia\r\n";
        }
        if($conCopiaOculta!=""){
        	$headers .= "Bcc: $conCopiaOculta\r\n";
        }
        $message = stripslashes( $message );

        if (!mail( $to, $subject, $message, $headers )) {
            throw new Exception("No se pudo enviar el correo");
        }
    }
}
?>