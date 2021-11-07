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
}