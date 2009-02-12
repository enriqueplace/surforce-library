<?php
/**
 * Controller Genérico para definir un comportamiento común a
 * todos los controllers para Administración de una aplicación.
 *
 * @category SURFORCE
 * @package SURFORCE-LIBRARY
 * @license GPL v2
 */

require_once '../application/default/models/Menu.php';
require_once '../application/default/models/Usuarios.php';

abstract class Zsurforce_Generic_ControllerUsuarios extends Zsurforce_Generic_Controller
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
        $auth = Zend_Auth::getInstance();

        if ($auth->hasIdentity ()) {
            $this->view->usuarioLogueado = true;

            /* Genera el menú dinámico para el sistema de admin */
            try{

                $layout = Zend_Layout::getMvcInstance();

                $layout->menu = Models_Menu::getMenu(
                    $this->_registry->config->application->id
                );

                $layout->menuItems = Models_Menu::getMenuItemsFromModule(
                    $this->view->moduleName
                );

            }catch(Zend_Db_Statement_Exception $e){

                $this->view->mensajeError =
                    'Se ha producido un error al intentar recuperar los datos <br><br>'
                .'['.$e->getMessage().']<br><br>'
                .' Por favor envíe un email a sistemas '.$this->_config->general->email ;

                if($this->_debug){
                    $this->view->mensajeError .= $e;
                }

            }catch(Zend_Db_Adapter_Exception $e){
                $this->view->mensajeError =
                    'Se ha producido un error al conectar a la base de datos.'
                .' Por favor reintente en unos minutos';
            }catch(Exception $e){
                $this->view->mensajeError =
                    'Se ha producido un error inesperado.'
                .' Por favor reintente en unos minutos';
            }

        }else {
            $this->_redirect('/usuarios/login/');
            return;
        }
    }
    public function init()
    {
        parent::init();
        Models_Usuarios::registrarAcceso(
            $this->_user->usuario_mail,
            $this->_moduleName,
            $this->_controllerName
        );
    }
}