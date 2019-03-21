<?php
// Creacion del  controlador de inventario 

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class InventarioController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
}
