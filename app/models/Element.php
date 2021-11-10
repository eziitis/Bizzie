<?php

class Element {
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getElements() {
    $this->db->query('SELECT * FROM elements');
    $result = $this->db->resultSet();
    return $result;
  }

  public function deleteElements($id) {
    $sql = 'DELETE FROM elements WHERE id =:id';
    $this->db->query($sql);
    $this->db->bind(':id',$id);
    $this->db->execute();

  }

  public function addElements($data) {
    var_dump($data);
    switch ($data['productType']) {
      case 'DVD':
        $sql = 'INSERT INTO elements (sku,name,price,productType,size,dateT) VALUES (:sku,:name,:price,:productType,:size,CURRENT_TIMESTAMP);';
        $this->db->query($sql);
        $this->db->bind(':productType',$data['productType']);
        $this->db->bind(':size',$data['size']);
        break;
      case 'BOOK':
        $sql='INSERT INTO elements  (sku,name,price,productType,weight,dateT) VALUES (:sku,:name,:price,:productType,:weight,CURRENT_TIMESTAMP);';
        $this->db->query($sql);
        $this->db->bind(':productType',$data['productType']);
        $this->db->bind(':weight',$data['weight']);
        break;
      case 'Furniture':
        $sql='INSERT INTO elements  (sku,name,price,productType,height,width,length,dateT) VALUES (:sku,:name,:price,:productType,:height,:width,:length,CURRENT_TIMESTAMP);';
        $this->db->query($sql);
        $this->db->bind(':productType',$data['productType']);
        $this->db->bind(':height',$data['height']);
        $this->db->bind(':width',$data['width']);
        $this->db->bind(':length',$data['length']);
        break;
      default:
        return 0;        
    }
    $this->db->bind(':sku',$data['sku']);
    $this->db->bind(':name',$data['name']);
    $this->db->bind(':price',$data['price']);
    $this->db->execute();
  }

}