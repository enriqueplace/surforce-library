<?php
/**
 * Controller Genérico para definir un comportamiento común a
 * todos los controllers para Administración de una aplicación.
 * 
 * @category SURFORCE
 * @package SURFORCE-LIBRARY 
 * @license GPL v2
 */
abstract class Zsurforce_Generic_ControllerAdmin extends Zsurforce_Generic_Controller
{
	/**
	 * Verifica siempre que el usuario esté logueado, de lo contrario
	 * interrumpe la ejecución de un controller.
	 * 
	 * Todo controller de un admin debería extender de este controller 
	 * genérico
	 */
	final function preDispatch()
	{
		$auth = Zend_Auth::getInstance ();
		if ($auth->hasIdentity ()) {
			$this->view->usuarioLogueado = true;
		}else {
			die('Acceso Restringido');
		}
	}	
}
?>