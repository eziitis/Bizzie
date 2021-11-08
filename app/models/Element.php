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
    $sql = 'DELETE FROM elements WHERE id ='.$id;
    $this->db->query($sql);
    //$this->db->bind(':id',$id);
    $this->db->execute();

    /*
    for($x=0;$x<count($list);$x++){
      $sql = "DELETE FROM elements WHERE id=".$list[$x];
      $this->db->query($sql);
    }
    */
  }

}