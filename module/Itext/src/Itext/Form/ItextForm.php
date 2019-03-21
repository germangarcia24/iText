<?php 

 namespace Itext\Form;

 use Zend\Form\Form;

 class ItextForm extends Form
 {
     public function __construct($name = null)
     {
         parent::__construct('itext');
         //ID del texto
         $this->add(array(
             'name' => 'ID',
             'type' => 'Hidden',
         ));
         //Caja de texto para el ID foraneo	
         $this->add(array(
             'name' => 'idf',
             'type' => 'Hidden',
         ));
         //Área de texto
         $this->add(array(
             'name' => 'value',
             'type' => 'Textarea',
             'options' => array(
                 'label' => 'Ingrese texto ',
             ),
         ));
         //Botón de enviar y/o guardar
         $this->add(array(
             'name' => 'submit',
             'type' => 'Submit',
             'attributes' => array(
                 'value' => 'Guardar',
                 'id' => 'submitbutton',
             ),
         ));
     }
 }

 ?>