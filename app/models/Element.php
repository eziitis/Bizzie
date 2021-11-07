<?php

class Element {
  private $db;

  public function __construct() {
    $this->db = new Database;
  }
}