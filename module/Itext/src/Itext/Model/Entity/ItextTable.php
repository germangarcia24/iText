<?php
namespace Itext\Model\Entity;


 use Zend\Db\TableGateway\TableGateway;
 use Zend\Db\Sql\Select;
 use Zend\Db\Sql\Sql;


 class ItextTable
 {
     protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     public function fetchAllTexts()
     {
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }

     public function getItextById($ID)
     {
         $ID  = (int) $ID;
         $rowset = $this->tableGateway->select(array('ID' => $ID));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $ID");
         }
         return $row;
     }

     public function addItext(Itext $itext)
     {
         $data = array(

             'idf'    =>$itext->idf,
             'value'      => $itext->value,
         );

         $ID = (int) $itext->ID;
         if ($ID == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getItextById($ID)) {
                 $this->tableGateway->update($data, array('ID' => $ID));
             } else {
                 throw new \Exception('No existe texto ');
             }
         }
     }

     public function deleteItext($ID)
     {
         $this->tableGateway->delete(array('ID' => (int) $ID));
     }
 }

 ?>