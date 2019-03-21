<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Itext\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Itext\Form\ItextForm;
use Itext\Model\Entity\Itext;

class ItextController extends AbstractActionController
{
    protected $itextTable;

    public function getItextTable(){
        if(!$this->itextTable){
            $sm = $this->getServiceLocator();
            $this->itextTable = $sm->get('Itext\Model\Entity\ItextTable');
        }
        return $this->itextTable;        
    }

    public function indexAction(){
        //$itexts = //$this->getItextTable()->fetchAll();
        return new ViewModel();//array('itexts' => $itexts));
    }

    public function addItextAction(){
        $form = new ItextForm();
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $itext = new Itext();
            $form->setInputFilter($itext->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                
                $itext->exchangeArray($form->getData());
                $this->getItextTable()->addItext($itext);
                return $this->redirect()->toRoute('itext/itext', array('controller'=>'itext', 'action' => 'addItext'));
                
            }
        }
        return array('form' => $form);   
    }

    public function updateItextAction(){
        
        $id = (int) $this->params()->fromRoute('ID', 0);
        $itext = null;
        if (!$id) {
            return $this->redirect()->toRoute('itext/itext', array('controller'=>'itext', 'action' => 'Error'));
        }
        try {
            $itext = $this->getItextTable()->getItextById($id);
            
        }
        catch (\Exception $ex) {
            //$this->flashMessenger()->addErrorMessage("No se encontró una serie con el id: ". $id.".");
            echo "Hubo un error"; exit;
            //return $this->redirect()->toRoute('itext/itext', array('controller'=>'itext', 'action' => 'index'));
            
        }
         
        $form  = new ItextForm();
        $form->bind($itext);
        $form->get('ID')->setAttribute('value', $itext->ID);
        $form->get('idf')->setAttribute('value', $itext->idf);
        $form->get('value')->setAttribute('value', $itext->value); 
        $form->get('submit')->setAttribute('value', 'Editar');

        $request = $this->getRequest();

        if ($request->isPost()) {
            $form->setInputFilter($itext->getInputFilter());
            $form->setData($request->getPost());


            if ($form->isValid()) {
                $this->getItextTable()->addItext($itext);
                return $this->redirect()->toRoute('itext/itext', array('controller'=>'itext', 'action' => 'addItext'));
            }
        }
        
        return array(
            'id' => $id,
            'form' => $form,
        );
    }

    public function deleteItextAction(){
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $id = (int) $request->getPost('ID');
            $this->getItextTable()->deleteItext($ID);
            return $this->redirect()->toRoute('itext/itext', array('controller'=>'itext', 'action' => 'addItext'));
        }
    }

        

}
