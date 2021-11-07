<?php

class Pages extends Controller {
  public function __construct() {
    $this->elemModel = $this->model('ELEMENT');

  }

  public function index() {
    $this->view('pages/index');
  }

  public function add() {
    $data = [
      'title' => 'Home Page',
      'name' => 'Harry Strickland'
    ];
    $this->view('pages/add',$data);
  }
  
}