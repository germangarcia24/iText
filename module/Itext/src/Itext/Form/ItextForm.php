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
         //Lista desplegables con los textos en la base (llena desde la xbase)
        $this->add(array(
             'type' => 'Zend\Form\Element\Select',
             'name' => 'value1',
             'options' => array(
                     'label' => 'Selecciona un texto: ',
                     //'empty_option' => 'Selecciona...',
                     'value_options' => array(
                     ),
             )
        ));
        /*
         //Área de texto
         $this->add(array(
             'name' => 'value',
             'type' => 'Textarea',
             'options' => array(
                 'label' => 'Ingrese texto ',
             ),
             'attributes' => array(
                'rows' => '10', 
                'cols' => '40'
             )
         ));
         */
         //Botón de enviar y/o guardar
         $this->add(array(
             'name' => 'submit',
             'type' => 'Submit',
             'attributes' => array(
                 'value' => 'Guardar',
                 'id' => 'submitbutton',
                'class' => 'btn btn-info'
             ),
         ));

         //Botón para carga de texto
         $this->add(array(
             'name' => 'submit1',
             'type' => 'Submit',
             'attributes' => array(
                 'value' => 'Cargar texto',
                 'id' => 'submitbutton',
                'class' => 'btn btn-info'
             ),
         ));
     }
 }

 ?>