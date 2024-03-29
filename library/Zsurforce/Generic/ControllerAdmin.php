<?php
/**
 * Controller Genérico para definir un comportamiento común a
 * todos los controllers para Administración de una aplicación.
 *
 * @category SURFORCE
 * @package SURFORCE-LIBRARY
 * @license GPL v2
 */

require_once '../application/admin/models/Menu.php';

abstract class Zsurforce_Generic_ControllerAdmin extends Zsurforce_Generic_Controller
{
    private $_admin;
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

            if(!isset($this->_user)){
                die('Error en autenticacion...');
            }

            $this->_admin = $this->view->admin = Zend_Auth::getInstance()->getIdentity();

            /* Genera el menú dinámico para el sistema de admin */
            try{

                $menuModel = new Admin_Models_Menu();

                $layout = Zend_Layout::getMvcInstance();

                $layout->menu = $menuModel->getMenu(
                        $this->_registry->config->database->table->admin_menu,
                        $this->_registry->config->application->id
                );

                /*
                $layout->menuItems = $menuModel->getMenuItemsFromModule(
                      $this->view->moduleName
                );*/

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
            $this->_redirect('/admin/login/');
            return;
        }
    }
}