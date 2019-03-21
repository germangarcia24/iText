<?php
namespace Itext\Model\Entity;


 use Zend\InputFilter\InputFilter;
 use Zend\InputFilter\InputFilterAwareInterface;
 use Zend\InputFilter\InputFilterInterface;

class Itext implements InputFilterAwareInterface
{
	 public $ID;
     public $idf;
     public $value;
     protected $inputFilter;

     public function exchangeArray($data)
     {
         $this->ID     = (!empty($data['ID'])) ? $data['ID'] : null;
         $this->idf = (!empty($data['idf'])) ? $data['idf'] : null;
         $this->value = (!empty($data['value'])) ? $data['value'] : null;
     }

     public function getArrayCopy()
    {
        return get_object_vars($this);
    }

     public function setInputFilter(InputFilterInterface $inputFilter)
     {
         throw new \Exception("Not used");
     }

     public function getInputFilter()
     {
         if (!$this->inputFilter) {
             $inputFilter = new InputFilter();

             $inputFilter->add(array(
                 'name'     => 'ID',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'Int'),
                 ),
             ));

             $inputFilter->add(array(
                 'name'     => 'idf',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'Int'),
                 ),
             ));

             $inputFilter->add(array(
                 'name'     => 'value',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                         ),
                     ),
                 ),
             ));

             $this->inputFilter = $inputFilter;
         }

         return $this->inputFilter;
     }
}
?>